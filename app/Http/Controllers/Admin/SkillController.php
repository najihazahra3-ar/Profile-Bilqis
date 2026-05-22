<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function index(): View
    {
        return view('admin.skills.index', [
            'skills' => Skill::orderByDesc('level')->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.skills.create', ['skill' => new Skill()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Skill::create($this->validatedData($request));

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan.');
    }

    public function edit(Skill $skill): View
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $skill->update($this->validatedData($request));

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'icon' => ['nullable', 'string', 'max:50'],
            'level' => ['required', 'integer', 'min:1', 'max:100'],
        ]);
    }
}
