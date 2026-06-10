@extends('layouts.admin')
@section('title', 'Messages')
@section('content')
<div class="admin-table">
  <table class="table table-borderless mb-0">
    <thead><tr><th>From</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      @forelse($messages as $msg)
      <tr style="{{ !$msg->read ? 'background:rgba(0,212,255,0.03)' : '' }}">
        <td>
          <div style="font-weight:{{ $msg->read ? '400' : '600' }}">{{ $msg->name }}</div>
          <div style="font-size:0.75rem;color:var(--text-muted)">{{ $msg->email }}</div>
        </td>
        <td style="font-weight:{{ $msg->read ? '400' : '600' }}">{{ $msg->subject }}</td>
        <td style="color:var(--text-muted);font-size:0.8rem;white-space:nowrap">{{ $msg->created_at->format('d M Y') }}</td>
        <td>
          @if(!$msg->read)<span style="font-size:0.7rem;font-weight:700;color:var(--accent-cyan);background:rgba(0,212,255,0.1);padding:0.2rem 0.6rem;border-radius:100px">New</span>
          @else<span style="font-size:0.7rem;color:var(--text-muted)">Read</span>@endif
        </td>
        <td>
          <div class="d-flex gap-2">
            <a href="{{ route('admin.messages.show', $msg) }}" class="project-link primary"><i class="bi bi-eye"></i></a>
            <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Delete?')">
              @csrf @method('DELETE')
              <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" class="text-center" style="padding:3rem;color:var(--text-muted)">
        <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:0.5rem;opacity:0.4"></i>No messages yet.
      </td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-3">{{ $messages->links() }}</div>
@endsection
