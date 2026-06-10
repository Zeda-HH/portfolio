<div class="mb-3">
    <label class="form-label">Skill Name *</label>
    <input type="text" name="name" class="form-control custom-input @error('name') is-invalid @enderror"
           value="{{ old('name', $skill->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Proficiency (%) *</label>
    <input type="number" name="percentage" min="0" max="100"
           class="form-control custom-input @error('percentage') is-invalid @enderror"
           value="{{ old('percentage', $skill->percentage ?? 80) }}" required>
    @error('percentage')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category" class="form-select custom-input">
        <option value="technical" {{ old('category', $skill->category ?? '') == 'technical' ? 'selected' : '' }}>Technical</option>
        <option value="soft" {{ old('category', $skill->category ?? '') == 'soft' ? 'selected' : '' }}>Soft Skill</option>
        <option value="tool" {{ old('category', $skill->category ?? '') == 'tool' ? 'selected' : '' }}>Tool</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control custom-input"
           value="{{ old('sort_order', $skill->sort_order ?? 0) }}">
</div>
<div class="mb-4 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
           {{ old('is_active', $skill->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active (visible on portfolio)</label>
</div>
<button type="submit" class="btn btn-primary-custom"><i class="bi bi-check-lg me-2"></i>Save Skill</button>
