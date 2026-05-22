<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::latest()->paginate(8),
        ]);
    }

    public function create(): View
    {
        return view('admin.experiences.create', ['experience' => new Experience()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['images'] = $this->storeImages($request, 'experiences');
        $data['image'] = $data['images'][0] ?? null;

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman acara berhasil ditambahkan.');
    }

    public function show(Experience $experience): View
    {
        return view('admin.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $data = $this->validatedData($request, true);

        if ($request->hasFile('images')) {
            $this->deleteImages($experience->image_paths);
            $data['images'] = $this->storeImages($request, 'experiences');
            $data['image'] = $data['images'][0] ?? null;
        }

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman acara berhasil diperbarui.');
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        $this->deleteImages($experience->image_paths);
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman acara berhasil dihapus.');
    }

    private function validatedData(Request $request, bool $isUpdate = false): array
    {
        return $request->validate([
            'event_name' => ['required', 'string', 'max:140'],
            'position' => ['required', 'string', 'max:120'],
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
