@extends('layouts.admin')
@section('title', 'Add Skill')
@section('content')
<div class="admin-card" style="max-width:600px">
    <div class="admin-card-header">
        <h3>Add New Skill</h3>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-sm btn-outline-custom"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>
    <form method="POST" action="{{ route('admin.skills.store') }}">
        @csrf
        @include('admin.skills._form')
    </form>
</div>
@endsection
