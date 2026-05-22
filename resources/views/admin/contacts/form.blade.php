<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nomor telepon</label>
        <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" class="form-control @error('phone') is-invalid @enderror" required>
        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="form-control @error('email') is-invalid @enderror" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Instagram</label>
        <input type="text" name="instagram" value="{{ old('instagram', $contact->instagram) }}" class="form-control @error('instagram') is-invalid @enderror" required>
        @error('instagram') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">WhatsApp format internasional</label>
        <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="6281234567890" required>
        @error('whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<hr>
