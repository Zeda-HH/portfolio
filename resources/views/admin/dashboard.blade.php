@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(0,212,255,0.1);color:var(--accent-cyan)"><i class="bi bi-folder2-open"></i></div>
      <div>
        <div class="stat-num">{{ $stats['projects'] }}</div>
        <div class="stat-label">Projects</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(255,209,102,0.1);color:var(--accent-gold)"><i class="bi bi-patch-check"></i></div>
      <div>
        <div class="stat-num">{{ $stats['certificates'] }}</div>
        <div class="stat-label">Certificates</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(124,92,191,0.1);color:var(--accent-purple)"><i class="bi bi-lightning-charge"></i></div>
      <div>
        <div class="stat-num">{{ $stats['skills'] }}</div>
        <div class="stat-label">Skills</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(0,212,100,0.1);color:#00d464"><i class="bi bi-chat-text"></i></div>
      <div>
        <div class="stat-num">{{ $stats['messages'] }}</div>
        <div class="stat-label">Messages <span style="font-size:0.7rem;color:var(--accent-cyan)">({{ $stats['unread'] }} new)</span></div>
      </div>
    </div>
  </div>
</div>

<div class="row g-3">
  <div class="col-lg-8">
    <div class="admin-card">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 style="font-size:1rem;font-weight:600;margin:0">Recent Messages</h3>
        <a href="{{ route('admin.messages.index') }}" class="project-link">View All</a>
      </div>
      @forelse($recentMessages as $msg)
      <div style="padding:0.875rem 0;border-bottom:1px solid var(--border-color);display:flex;align-items:center;gap:1rem">
        <div style="width:36px;height:36px;border-radius:50%;background:rgba(0,212,255,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--accent-cyan);font-size:0.9rem">
          {{ strtoupper(substr($msg->name, 0, 1)) }}
        </div>
        <div style="flex:1;min-width:0">
          <div style="font-size:0.875rem;font-weight:500;color:var(--text-primary)">
            {{ $msg->name }}
            @if(!$msg->read)<span class="badge-unread">New</span>@endif
          </div>
          <div style="font-size:0.75rem;color:var(--text-muted);overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $msg->subject }}</div>
        </div>
        <div style="font-size:0.7rem;color:var(--text-muted);white-space:nowrap">{{ $msg->created_at->diffForHumans() }}</div>
      </div>
      @empty
        <p style="color:var(--text-muted);font-size:0.875rem;text-align:center;padding:2rem 0">No messages yet.</p>
      @endforelse
    </div>
  </div>
  <div class="col-lg-4">
    <div class="admin-card">
      <h3 style="font-size:1rem;font-weight:600;margin-bottom:1rem">Quick Actions</h3>
      <div class="d-flex flex-column gap-2">
        <a href="{{ route('admin.projects.create') }}" class="btn-outline-custom justify-content-start"><i class="bi bi-plus-circle"></i> Add Project</a>
        <a href="{{ route('admin.certificates.create') }}" class="btn-outline-custom justify-content-start"><i class="bi bi-plus-circle"></i> Add Certificate</a>
        <a href="{{ route('admin.skills.index') }}" class="btn-outline-custom justify-content-start"><i class="bi bi-lightning-charge"></i> Manage Skills</a>
        <a href="{{ route('portfolio') }}" class="btn-outline-custom justify-content-start" target="_blank"><i class="bi bi-eye"></i> Preview Site</a>
      </div>
    </div>
  </div>
</div>
@endsection
