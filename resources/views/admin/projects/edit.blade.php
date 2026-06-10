@extends('layouts.admin')
@section('title', 'Edit Project')
@section('content')
<div class="admin-card" style="max-width:700px">
    <div class="admin-card-header">
        <h3>Edit Project</h3>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-custom"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>
    <form method="POST" action="{{ route('admin.projects.update', $project) }}">
        @csrf @method('PUT')
        @include('admin.projects._form')
    </form>
</div>
@endsection
