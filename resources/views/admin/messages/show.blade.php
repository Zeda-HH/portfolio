@extends('layouts.admin')
@section('title', 'Message from ' . $message->name)
@section('content')
<div style="max-width:640px">
  <a href="{{ route('admin.messages.index') }}" class="project-link mb-4 d-inline-flex"><i class="bi bi-arrow-left"></i> Back</a>
  <div class="admin-card mt-3">
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem;padding-bottom:1.5rem;border-bottom:1px solid var(--border-color)">
      <div style="width:48px;height:48px;border-radius:50%;background:rgba(0,212,255,0.1);display:flex;align-items:center;justify-content:center;font-size:1.2rem;font-weight:700;color:var(--accent-cyan)">
        {{ strtoupper(substr($message->name, 0, 1)) }}
      </div>
      <div>
        <div style="font-weight:600">{{ $message->name }}</div>
        <div style="font-size:0.85rem;color:var(--text-muted)">{{ $message->email }}</div>
      </div>
      <div style="margin-left:auto;font-size:0.8rem;color:var(--text-muted)">{{ $message->created_at->format('d M Y, H:i') }}</div>
    </div>
    <div style="font-size:0.75rem;font-weight:600;text-transform:uppercase;color:var(--text-muted);margin-bottom:0.35rem">Subject</div>
    <div style="font-size:1.05rem;font-weight:600;margin-bottom:1.5rem">{{ $message->subject }}</div>
    <div style="font-size:0.75rem;font-weight:600;text-transform:uppercase;color:var(--text-muted);margin-bottom:0.5rem">Message</div>
    <div style="color:var(--text-secondary);line-height:1.8;white-space:pre-wrap">{{ $message->message }}</div>
    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid var(--border-color)">
      <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" class="btn-primary-custom"><i class="bi bi-reply"></i> Reply</a>
      <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete?')">
        @csrf @method('DELETE')
        <button type="submit" class="btn-outline-custom" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i> Delete</button>
      </form>
    </div>
  </div>
</div>
@endsection
