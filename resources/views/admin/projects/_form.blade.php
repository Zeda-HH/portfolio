<div class="mb-3">
    <label class="form-label">Project Title *</label>
    <input type="text" name="title" class="form-control custom-input @error('title') is-invalid @enderror"
           value="{{ old('title', $project->title ?? '') }}" required>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Description *</label>
    <textarea name="description" class="form-control custom-input @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Technologies * <small class="text-muted">(comma-separated)</small></label>
    <input type="text" name="technologies" class="form-control custom-input @error('technologies') is-invalid @enderror"
           value="{{ old('technologies', $project->technologies ?? '') }}" placeholder="Power BI, SQL, DAX" required>
    @error('technologies')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label">GitHub URL</label>
        <input type="url" name="github_url" class="form-control custom-input"
               value="{{ old('github_url', $project->github_url ?? '') }}" placeholder="https://github.com/...">
    </div>
    <div class="col-md-6">
        <label class="form-label">LinkedIn Showcase URL</label>
        <input type="url" name="linkedin_url" class="form-control custom-input"
               value="{{ old('linkedin_url', $project->linkedin_url ?? '') }}" placeholder="https://linkedin.com/...">
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Live Demo URL</label>
    <input type="url" name="live_url" class="form-control custom-input"
           value="{{ old('live_url', $project->live_url ?? '') }}" placeholder="https://...">
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control custom-input"
           value="{{ old('sort_order', $project->sort_order ?? 0) }}">
</div>
<div class="d-flex gap-4 mb-4">
    <div class="form-check">
        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured"
               {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_featured">Featured Project</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
               {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_active">Active (visible)</label>
    </div>
</div>
<button type="submit" class="btn btn-primary-custom"><i class="bi bi-check-lg me-2"></i>Save Project</button>
