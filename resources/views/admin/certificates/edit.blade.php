@extends('layouts.admin')
@section('title', 'Edit Certificate')
@section('content')
<div class="admin-card" style="max-width:600px">
    <div class="admin-card-header">
        <h3>Edit Certificate</h3>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-sm btn-outline-custom"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>
    <form method="POST" action="{{ route('admin.certificates.update, $certificate') }}">
        @csrf @method('PUT')
        @include('admin.certificates._form')
    </form>
</div>
@endsection
