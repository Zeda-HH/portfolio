<div class="mb-3">
    <label class="form-label">Certificate Title *</label>
    <input type="text" name="title" class="form-control custom-input @error('title') is-invalid @enderror"
           value="{{ old('title', $certificate->title ?? '') }}" required>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Issuing Organization *</label>
    <input type="text" name="issuer" class="form-control custom-input @error('issuer') is-invalid @enderror"
           value="{{ old('issuer', $certificate->issuer ?? '') }}" required>
    @error('issuer')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control custom-input" rows="4">{{ old('description', $certificate->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Credential URL</label>
    <input type="url" name="credential_url" class="form-control custom-input @error('credential_url') is-invalid @enderror"
           value="{{ old('credential_url', $certificate->credential_url ?? '') }}" placeholder="https://...">
    @error('credential_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Issued Date</label>
    <input type="date" name="issued_date" class="form-control custom-input"
           value="{{ old('issued_date', isset($certificate->issued_date) ? $certificate->issued_date->format('Y-m-d') : '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control custom-input"
           value="{{ old('sort_order', $certificate->sort_order ?? 0) }}">
</div>
<div class="mb-4 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
           {{ old('is_active', $certificate->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active (visible on portfolio)</label>
</div>
<button type="submit" class="btn btn-primary-custom"><i class="bi bi-check-lg me-2"></i>Save Certificate</button>
