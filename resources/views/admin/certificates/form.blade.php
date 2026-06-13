@extends('layouts.admin')
@section('title', isset($certificate->id) ? 'Edit Certificate' : 'Add Certificate')
@section('content')
<div style="max-width:640px">
  <a href="{{ route('admin.certificates.index') }}" class="project-link mb-4 d-inline-flex"><i class="bi bi-arrow-left"></i> Back</a>
  <div class="admin-card mt-3">
    <form action="{{ isset($certificate->id) ? route('admin.certificates.update', $certificate) : route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($certificate->id)) @method('PUT') @endif
      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">Certificate Title *</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $certificate->title) }}" required>
        </div>
        <div class="col-12">
          <label class="form-label">Certificate Image/Badge</label>
          @if($certificate->image)
            <div class="mb-2">
            <img src="{{ $certificate->image }}" style="max-width:150px;border-radius:8px;border:1px solid var(--border-color)">
            </div>
          @endif
          <input type="file" name="image" class="form-control" accept="image/*">
          @error('image')<div style="color:#ff5050;font-size:0.8rem;margin-top:4px">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label class="form-label">Issuing Organization *</label>
          <input type="text" name="issuer" class="form-control" value="{{ old('issuer', $certificate->issuer) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Issue Date</label>
          <input type="date" name="issued_date" class="form-control"
                 value="{{ old('issued_date', $certificate->issued_date ? $certificate->issued_date->format('Y-m-d') : '') }}">
        </div>
        <div class="col-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3">{{ old('description', $certificate->description) }}</textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Credential URL</label>
          <input type="url" name="credential_url" class="form-control" value="{{ old('credential_url', $certificate->credential_url) }}" placeholder="https://...">
        </div>
        <div class="col-md-4">
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $certificate->sort_order ?? 0) }}">
        </div>
        <div class="col-12 d-flex gap-3 pt-2">
          <button type="submit" class="btn-primary-custom"><i class="bi bi-check-lg"></i> {{ isset($certificate->id) ? 'Update' : 'Create' }}</button>
          <a href="{{ route('admin.certificates.index') }}" class="btn-outline-custom">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
