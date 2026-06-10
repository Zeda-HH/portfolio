@extends('layouts.admin')
@section('title', 'Messages')
@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h3>Contact Messages</h3>
    </div>
    <div class="table-responsive">
        <table class="admin-table">
            <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr class="{{ !$contact->is_read ? 'row-unread' : '' }}">
                    <td><strong>{{ $contact->name }}</strong></td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ Str::limit($contact->subject, 40) }}</td>
                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                    <td>
                        @if(!$contact->is_read)
                        <span class="badge-unread">New</span>
                        @else
                        <span class="badge-read">Read</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn-action btn-view"><i class="bi bi-eye-fill"></i></a>
                        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="d-inline" onsubmit="return confirm('Delete message?')">
                            @csrf @method('DELETE')
                            <button class="btn-action btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-4 text-muted">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $contacts->links() }}</div>
</div>
@endsection
