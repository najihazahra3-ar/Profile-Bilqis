<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama acara / karya</label>
        <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" class="form-control @error('title') is-invalid @enderror" required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Jabatan / divisi</label>
        <input type="text" name="role" value="{{ old('role', $portfolio->role) }}" class="form-control @error('role') is-invalid @enderror" required>
        @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-2">
        <label class="form-label">Tahun</label>
        <input type="number" name="year" value="{{ old('year', $portfolio->year ?? date('Y')) }}" class="form-control @error('year') is-invalid @enderror" required>
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi kegiatan</label>
        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $portfolio->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto dokumentasi</label>
        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple {{ $portfolio->exists ? '' : 'required' }}>
        <small class="text-muted">Pilih lebih dari satu gambar jika perlu; slide akan tampil sebagai carousel.</small>
        @error('images') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @error('images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">@include('admin.shared.preview', ['images' => $portfolio->image_paths])</div>
</div>
<hr>
