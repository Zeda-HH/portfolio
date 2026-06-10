@extends('layouts.admin')
@section('title', 'Message from ' . $contact->name)
@section('content')
<div class="admin-card" style="max-width:700px">
    <div class="admin-card-header">
        <h3>Message Details</h3>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-custom"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>
    <div class="message-detail">
        <div class="message-meta">
            <div class="meta-item"><span class="meta-label">From:</span> <strong>{{ $contact->name }}</strong></div>
            <div class="meta-item"><span class="meta-label">Email:</span> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
            <div class="meta-item"><span class="meta-label">Subject:</span> {{ $contact->subject }}</div>
            <div class="meta-item"><span class="meta-label">Date:</span> {{ $contact->created_at->format('F d, Y \a\t g:i A') }}</div>
        </div>
        <div class="message-body">
            {{ $contact->message }}
        </div>
        <div class="message-actions">
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary-custom">
                <i class="bi bi-reply-fill me-2"></i>Reply via Email
            </a>
            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="d-inline" onsubmit="return confirm('Delete?')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-custom"><i class="bi bi-trash-fill me-2"></i>Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
