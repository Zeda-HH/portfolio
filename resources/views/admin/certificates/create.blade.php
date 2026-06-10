@extends('layouts.admin')
@section('title', 'Add Certificate')
@section('content')
<div class="admin-card" style="max-width:600px">
    <div class="admin-card-header">
        <h3>Add Certificate</h3>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-sm btn-outline-custom"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>
    <form method="POST" action="{{ route('admin.certificates.store') }}">
        @csrf
        @include('admin.certificates._form')
    </form>
</div>
@endsection
