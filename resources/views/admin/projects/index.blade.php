@extends('layouts.admin')
@section('title', 'Projects')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p style="color:var(--text-muted);margin:0">{{ $projects->count() }} projects total</p>
  <a href="{{ route('admin.projects.create') }}" class="btn-primary-custom"><i class="bi bi-plus-lg"></i> Add Project</a>
</div>
<div class="admin-table">
  <table class="table table-borderless mb-0">
    <thead><tr>
      <th>Title</th><th>Technologies</th><th>Featured</th><th>Order</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @forelse($projects as $p)
      <tr>
        <td><div style="font-weight:500">{{ $p->title }}</div><div style="font-size:0.75rem;color:var(--text-muted)">{{ Str::limit($p->description,60) }}</div></td>
        <td>
          <div style="display:flex;flex-wrap:wrap;gap:4px">
           @foreach(array_slice(is_array($p->technologies) ? $p->technologies : (json_decode($p->technologies, true) ?? []), 0, 3) as $t)
              <span class="tech-tag">{{ $t }}</span>
            @endforeach
          </div>
        </td>
        <td>
          @if($p->featured)<span style="color:var(--accent-gold)"><i class="bi bi-star-fill"></i></span>
          @else<span style="color:var(--text-muted)"><i class="bi bi-star"></i></span>@endif
        </td>
        <td style="color:var(--text-muted)">{{ $p->sort_order }}</td>
        <td>
          <div class="d-flex gap-2">
            <a href="{{ route('admin.projects.edit', $p) }}" class="project-link"><i class="bi bi-pencil"></i></a>
            <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" onsubmit="return confirm('Delete this project?')">
              @csrf @method('DELETE')
              <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" class="text-center" style="padding:2rem;color:var(--text-muted)">No projects yet. <a href="{{ route('admin.projects.create') }}">Add one</a>.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
