@extends('layouts.admin')
@section('title', isset($project->id) ? 'Edit Project' : 'Add Project')
@section('content')
<div style="max-width:720px">
  <a href="{{ route('admin.projects.index') }}" class="project-link mb-4 d-inline-flex"><i class="bi bi-arrow-left"></i> Back</a>
  <div class="admin-card mt-3">
    <form action="{{ isset($project->id) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($project->id)) @method('PUT') @endif
      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">Project Title *</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
          @error('title')<div style="color:#ff5050;font-size:0.8rem;margin-top:4px">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
          <label class="form-label">Thumbnail Image</label>
          @if($project->thumbnail)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $project->thumbnail) }}" style="max-width:200px;border-radius:8px;border:1px solid var(--border-color)">
            </div>
          @endif
          <input type="file" name="thumbnail" class="form-control" accept="image/*">
          @error('thumbnail')<div style="color:#ff5050;font-size:0.8rem;margin-top:4px">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
          <label class="form-label">Description *</label>
          <textarea name="description" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
          @error('description')<div style="color:#ff5050;font-size:0.8rem;margin-top:4px">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
          <label class="form-label">Technologies (comma-separated)</label>
          <input type="text" name="technologies_input" class="form-control"
                 value="{{ old('technologies_input', is_array($project->technologies) ? implode(', ', $project->technologies) : '') }}"
                 placeholder="Power BI, SQL, Excel, Python">
        </div>

        <div class="col-md-6">
          <label class="form-label">GitHub URL</label>
          <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $project->github_url) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label">LinkedIn/Showcase URL</label>
          <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $project->linkedin_url) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label">Live URL (optional)</label>
          <input type="url" name="live_url" class="form-control" value="{{ old('live_url', $project->live_url) }}">
        </div>

        <div class="col-md-3">
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $project->sort_order ?? 0) }}">
        </div>

        <div class="col-md-3 d-flex align-items-end">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured"
                   {{ old('featured', $project->featured) ? 'checked' : '' }}
                   style="background-color:var(--bg-secondary);border-color:var(--border-color)">
            <label class="form-check-label" for="featured" style="color:var(--text-secondary);font-size:0.875rem">Featured</label>
          </div>
        </div>

        <div class="col-12 d-flex gap-3 pt-2">
          <button type="submit" class="btn-primary-custom">
            <i class="bi bi-check-lg"></i> {{ isset($project->id) ? 'Update' : 'Create' }} Project
          </button>
          <a href="{{ route('admin.projects.index') }}" class="btn-outline-custom">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection