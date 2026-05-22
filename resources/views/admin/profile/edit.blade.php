@extends('admin.layout')

@section('title', 'Profil Website')
@section('page-title', 'Profil Website')

@section('content')
    <section class="admin-card">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama brand depan</label>
                    <input type="text" name="brand_name" value="{{ old('brand_name', $profile->brand_name) }}" class="form-control @error('brand_name') is-invalid @enderror" required>
                    @error('brand_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama brand aksen</label>
                    <input type="text" name="brand_accent" value="{{ old('brand_accent', $profile->brand_accent) }}" class="form-control @error('brand_accent') is-invalid @enderror" required>
                    @error('brand_accent') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-8">
                    <label class="form-label">Nama pemilik portfolio</label>
                    <input type="text" name="owner_name" value="{{ old('owner_name', $profile->owner_name) }}" class="form-control @error('owner_name') is-invalid @enderror" required>
                    @error('owner_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Inisial avatar</label>
                    <input type="text" name="avatar_initials" value="{{ old('avatar_initials', $profile->avatar_initials) }}" maxlength="6" class="form-control @error('avatar_initials') is-invalid @enderror" placeholder="BN">
                    @error('avatar_initials') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Foto avatar About Me</label>
                    <input type="file" name="avatar_image" class="form-control @error('avatar_image') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Kosongkan jika tetap memakai inisial.</small>
                    @error('avatar_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    @if ($profile->avatar_image)
                        <img class="preview-image" src="{{ asset('storage/'.$profile->avatar_image) }}" alt="Preview avatar">
                    @else
                        <div class="preview-image preview-empty">Avatar saat ini memakai inisial {{ $profile->resolved_initials }}</div>
                    @endif
                </div>

                <div class="col-md-5">
                    <label class="form-label">Eyebrow hero</label>
                    <input type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $profile->hero_eyebrow) }}" class="form-control @error('hero_eyebrow') is-invalid @enderror" required>
                    @error('hero_eyebrow') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-7">
                    <label class="form-label">Heading About Me</label>
                    <input type="text" name="about_heading" value="{{ old('about_heading', $profile->about_heading) }}" class="form-control @error('about_heading') is-invalid @enderror" required>
                    @error('about_heading') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi hero</label>
                    <textarea name="hero_description" rows="3" class="form-control @error('hero_description') is-invalid @enderror" required>{{ old('hero_description', $profile->hero_description) }}</textarea>
                    @error('hero_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Ringkasan profil card</label>
                    <textarea name="profile_summary" rows="3" class="form-control @error('profile_summary') is-invalid @enderror" required>{{ old('profile_summary', $profile->profile_summary) }}</textarea>
                    @error('profile_summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Judul cerita</label>
                    <input type="text" name="story_title" value="{{ old('story_title', $profile->story_title) }}" class="form-control @error('story_title') is-invalid @enderror" required>
                    @error('story_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-8">
                    <label class="form-label">Nama footer</label>
                    <input type="text" name="footer_name" value="{{ old('footer_name', $profile->footer_name) }}" class="form-control @error('footer_name') is-invalid @enderror" required>
                    @error('footer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Cerita singkat</label>
                    <textarea name="story_text" rows="6" class="form-control @error('story_text') is-invalid @enderror" required>{{ old('story_text', $profile->story_text) }}</textarea>
                    @error('story_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Minat / tag About Me</label>
                    <textarea name="interests" rows="4" class="form-control @error('interests') is-invalid @enderror" placeholder="Satu minat per baris">{{ old('interests', implode(PHP_EOL, $profile->interests ?? [])) }}</textarea>
                    <small class="text-muted">Tulis satu minat per baris, misalnya Creative Content.</small>
                    @error('interests') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <hr>
            <button class="btn btn-pink" type="submit">Simpan Profil</button>
            <a class="btn btn-light" href="{{ route('home') }}" target="_blank">Lihat Website</a>
        </form>
    </section>
@endsection
