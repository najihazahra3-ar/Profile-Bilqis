<div class="row g-3">
    <div class="col-md-5">
        <label class="form-label">Nama skill</label>
        <input type="text" name="name" value="{{ old('name', $skill->name) }}" class="form-control @error('name') is-invalid @enderror" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Icon FontAwesome opsional</label>
        <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" class="form-control @error('icon') is-invalid @enderror" placeholder="palette">
        @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-3">
        <label class="form-label">Level 1-100</label>
        <input type="number" name="level" value="{{ old('level', $skill->level ?? 80) }}" min="1" max="100" class="form-control @error('level') is-invalid @enderror" required>
        @error('level') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<hr>
