@extends('layouts.admin')
@section('title', 'Certificates')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p style="color:var(--text-muted);margin:0">{{ $certificates->count() }} certificates</p>
  <a href="{{ route('admin.certificates.create') }}" class="btn-primary-custom"><i class="bi bi-plus-lg"></i> Add Certificate</a>
</div>
<div class="admin-table">
  <table class="table table-borderless mb-0">
    <thead><tr><th>Title</th><th>Issuer</th><th>Issued</th><th>Actions</th></tr></thead>
    <tbody>
      @forelse($certificates as $c)
      <tr>
        <td style="font-weight:500">{{ $c->title }}</td>
        <td><span style="color:var(--accent-gold);font-size:0.85rem">{{ $c->issuer }}</span></td>
        <td style="color:var(--text-muted);font-size:0.85rem">{{ $c->issued_date ? $c->issued_date->format('M Y') : '—' }}</td>
        <td>
          <div class="d-flex gap-2">
            <a href="{{ route('admin.certificates.edit', $c) }}" class="project-link"><i class="bi bi-pencil"></i></a>
            <form action="{{ route('admin.certificates.destroy', $c) }}" method="POST" onsubmit="return confirm('Delete?')">
              @csrf @method('DELETE')
              <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="4" class="text-center" style="padding:2rem;color:var(--text-muted)">No certificates. <a href="{{ route('admin.certificates.create') }}">Add one</a>.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
