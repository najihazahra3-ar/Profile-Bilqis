<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('admin.profile.edit', [
            'profile' => Profile::current(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $profile = Profile::query()->firstOrCreate([], Profile::defaults());
        $data = $request->validate([
            'brand_name' => ['required', 'string', 'max:60'],
            'brand_accent' => ['required', 'string', 'max:60'],
            'owner_name' => ['required', 'string', 'max:120'],
            'hero_eyebrow' => ['required', 'string', 'max:120'],
            'hero_description' => ['required', 'string'],
            'about_heading' => ['required', 'string', 'max:160'],
            'avatar_initials' => ['nullable', 'string', 'max:6'],
            'avatar_image' => ['nullable', 'image', 'max:2048'],
            'profile_summary' => ['required', 'string'],
            'story_title' => ['required', 'string', 'max:120'],
            'story_text' => ['required', 'string'],
            'interests' => ['nullable', 'string'],
            'footer_name' => ['required', 'string', 'max:80'],
        ]);

        $data['interests'] = collect(preg_split('/\r\n|\r|\n/', $data['interests'] ?? ''))
            ->map(fn (string $interest) => trim($interest))
            ->filter()
            ->values()
            ->all();

        if ($request->hasFile('avatar_image')) {
            if ($profile->avatar_image) {
                Storage::disk('public')->delete($profile->avatar_image);
            }

            $data['avatar_image'] = $request->file('avatar_image')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Profil website berhasil diperbarui.');
    }
}
