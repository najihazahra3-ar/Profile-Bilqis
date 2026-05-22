<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('admin.portfolios.index', [
            'portfolios' => Portfolio::latest()->paginate(8),
        ]);
    }

    public function create(): View
    {
        return view('admin.portfolios.create', ['portfolio' => new Portfolio()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['images'] = $this->storeImages($request, 'portfolios');
        $data['image'] = $data['images'][0] ?? null;

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function show(Portfolio $portfolio): View
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio): View
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $this->validatedData($request, true);

        if ($request->hasFile('images')) {
            $this->deleteImages($portfolio->image_paths);
            $data['images'] = $this->storeImages($request, 'portfolios');
            $data['image'] = $data['images'][0] ?? null;
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $this->deleteImages($portfolio->image_paths);
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus.');
    }

    private function validatedData(Request $request, bool $isUpdate = false): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'role' => ['required', 'string', 'max:120'],
            'year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'description' => ['required', 'string'],
            'images' => [$isUpdate ? 'nullable' : 'required', 'array'],
            'images.*' => ['image', 'max:2048'],
        ]);
    }

    private function storeImages(Request $request, string $folder): array
    {
        return collect($request->file('images', []))
            ->map(fn ($file) => $file->store($folder, 'public'))
            ->filter()
            ->values()
            ->all();
    }

    private function deleteImages(array $paths): void
    {
        foreach ($paths as $path) {
            Storage::disk('public')->delete($path);
        }
    }
}
