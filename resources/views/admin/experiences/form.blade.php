<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama acara</label>
        <input type="text" name="event_name" value="{{ old('event_name', $experience->event_name) }}" class="form-control @error('event_name') is-invalid @enderror" required>
        @error('event_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Jabatan / divisi</label>
        <input type="text" name="position" value="{{ old('position', $experience->position) }}" class="form-control @error('position') is-invalid @enderror" required>
        @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-2">
        <label class="form-label">Tahun</label>
        <input type="number" name="year" value="{{ old('year', $experience->year ?? date('Y')) }}" class="form-control @error('year') is-invalid @enderror" required>
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi kegiatan</label>
        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $experience->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto dokumentasi</label>
        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple {{ $experience->exists ? '' : 'required' }}>
        <small class="text-muted">Pilih lebih dari satu gambar jika perlu; slide akan tampil sebagai carousel.</small>
        @error('images') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @error('images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">@include('admin.shared.preview', ['images' => $experience->image_paths])</div>
</div>
<hr>
