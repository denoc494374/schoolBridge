<x-app-layout>
<style>
    :root {
        --gold: #C8942A;
        --gold-light: #F5E4B8;
        --navy: #0D1F3C;
        --navy-mid: #1C3560;
        --cream: #FDFAF4;
        --text: #0D1F3C;
        --text-muted: #4A5A78;
        --border: rgba(13, 31, 60, 0.12);
        --radius: 16px;
    }

    body {
        font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: var(--cream);
    }

    .student-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
        height: 100vh;
        background: var(--navy);
        color: white;
        padding: 32px 24px;
        overflow-y: auto;
        z-index: 100;
        border-right: 0.5px solid rgba(255,255,255,0.08);
        display: flex;
        flex-direction: column;
    }

    .student-sidebar h3 {
        font-family: 'Fraunces', serif;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
    }

    .sidebar-user {
        margin-top: auto;
        padding-top: 16px;
        border-top: 0.5px solid rgba(255,255,255,0.1);
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: var(--gold);
        color: var(--navy);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .user-details {
        flex: 1;
        min-width: 0;
    }

    .user-name {
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 4px;
    }

    .user-email {
        color: rgba(255,255,255,0.6);
        font-size: 0.75rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-actions {
        display: flex;
        gap: 8px;
        padding-top: 8px;
        border-top: 0.5px solid rgba(255,255,255,0.1);
    }

    .user-btn {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 6px;
        background: transparent;
        color: rgba(255,255,255,0.8);
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .user-btn:hover {
        background: rgba(255,255,255,0.1);
        color: white;
        border-color: rgba(255,255,255,0.4);
    }

    .student-content {
        margin-left: 260px;
        padding: 40px;
        background: var(--cream);
        min-height: 100vh;
    }

    footer {
        margin-left: 260px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border-radius: 10px;
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .nav-link:hover {
        background: rgba(255,255,255,0.12);
        color: #fff;
    }

    .nav-link.active {
        background: rgba(200, 148, 42, 0.2);
        color: #fff;
        border-left: 2px solid var(--gold);
        padding-left: 14px;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        background: #fff;
        transition: all 0.2s ease;
    }

    .card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .card-body {
        padding: 24px;
    }

    .card-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    .card-header {
        background: var(--cream);
        border: none;
        padding: 20px;
    }

    .page-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 1.8rem;
    }

    .badge {
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .badge.bg-success { background: #10b981 !important; }
    .badge.bg-warning { background: #f59e0b !important; }
    .badge.bg-danger { background: #ef4444 !important; }
    .badge.bg-secondary { background: var(--text-muted) !important; }

    .btn {
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background: var(--navy);
        border: none;
        color: #fff;
    }

    .btn-primary:hover {
        background: var(--gold);
        color: var(--navy);
    }

    .btn-outline-secondary {
        color: var(--navy);
        border-color: var(--border);
    }

    .btn-outline-secondary:hover {
        background: var(--cream);
        border-color: var(--navy);
        color: var(--navy);
    }
</style>
    <div class="student-sidebar">
            <div style="margin-bottom: 32px;">
                <a href="/" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                    <i class="ti ti-school" style="font-size: 24px; color: var(--gold);"></i>
                    <span style="font-family: 'Fraunces', serif; font-size: 1.2rem; font-weight: 600; color: white;">ScholarBridge</span>
                </a>
                <div style="font-size: 0.85rem; color: rgba(255,255,255,0.6); display: flex; align-items: center; gap: 8px; padding-left: 34px;">
                    <i class="ti ti-user-graduate" style="font-size: 16px;"></i>
                    <span>Student</span>
                </div>
            </div>

            <nav style="display: flex; flex-direction: column; gap: 8px;">
                <a href="{{ route('student.dashboard') }}" class="nav-link">
                    <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('student.scholarships.index') }}" class="nav-link">
                    <i class="ti ti-award" style="font-size: 18px;"></i>
                    <span>Available</span>
                </a>

                <a href="{{ route('student.applications.index') }}" class="nav-link {{ !request('status') ? 'active' : '' }}">
                    <i class="ti ti-clipboard-list" style="font-size: 18px;"></i>
                    <span>My Applications</span>
                </a>

                <a href="{{ route('student.applications.index', ['status' => 'approved']) }}" class="nav-link {{ request('status') === 'approved' ? 'active' : '' }}">
                    <i class="ti ti-check-circle" style="font-size: 18px;"></i>
                    <span>Approved</span>
                </a>
            </nav>

            <div class="sidebar-user">
                <div class="user-info">
                    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <div class="user-details">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-email">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="user-actions">
                    <a href="{{ route('profile.edit') }}" class="user-btn">
                        <i class="ti ti-user" style="font-size: 14px;"></i>
                        <span>Profile</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="flex: 1; display: contents;">
                        @csrf
                        <button type="submit" class="user-btn" style="width: 100%; margin: 0;">
                            <i class="ti ti-logout" style="font-size: 14px;"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Main Content -->
    <div class="student-content">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h1 class="page-title">
                            @if(request('status') === 'approved')
                                Approved Scholarships
                            @else
                                Your Applications
                            @endif
                        </h1>
                        <p class="text-muted">Track the status of your scholarship submissions.</p>
                    </div>
                </div>

                <div class="row g-3">
                    @forelse($applications as $application)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ $application->scholarship->title }}</h5>
                                        <p class="text-muted small mb-2">Submitted {{ $application->submitted_at->format('F j, Y') }}</p>
                                        <p class="mb-0">Status: <strong>{{ ucfirst($application->status) }}</strong></p>
                                    </div>
                                    <div class="d-flex gap-2 mt-3 mt-md-0">
                                        <a href="{{ route('student.applications.show', $application) }}" class="btn btn-primary btn-sm">
                                            <i class="ti ti-eye me-1"></i>View Details
                                        </a>
                                        @php
                                            $badgeClass = match($application->status) {
                                                'approved' => 'success',
                                                'pending' => 'warning',
                                                'rejected' => 'danger',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badgeClass }} align-self-center">{{ ucfirst($application->status) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-muted">
                                    @if(request('status') === 'approved')
                                        You don't have any approved scholarships yet. Keep applying!
                                    @else
                                        You have not applied to any scholarships yet. Browse available opportunities.
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if($applications->hasPages())
                    <div class="mt-4">
                        {{ $applications->links() }}
                    </div>
                @endif
            </div>
    </div>
    </x-app-layout>
