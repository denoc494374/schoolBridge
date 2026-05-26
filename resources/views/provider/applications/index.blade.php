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

    .provider-container {
        display: flex;
        margin-top: 0;
    }

    .provider-sidebar {
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

    .provider-sidebar h3 {
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

    .provider-content {
        flex: 1;
        margin-left: 260px;
        padding: 40px;
        background: var(--cream);
    }

    footer {
        margin-left: 260px;
    }

    .scholarbridge-footer-wrapper {
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

<div class="provider-container">
    <div class="provider-sidebar">
    <div style="margin-bottom: 32px;">
        <a href="/" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
            <i class="ti ti-school" style="font-size: 24px; color: var(--gold);"></i>
            <span style="font-family: 'Fraunces', serif; font-size: 1.2rem; font-weight: 600; color: white;">ScholarBridge</span>
        </a>
        <div style="font-size: 0.85rem; color: rgba(255,255,255,0.6); display: flex; align-items: center; gap: 8px; padding-left: 34px;">
            <i class="ti ti-building" style="font-size: 16px;"></i>
            <span>Provider</span>
        </div>
    </div>

    <nav style="display: flex; flex-direction: column; gap: 8px;">
        <a href="{{ route('provider.dashboard') }}" class="nav-link {{ request()->routeIs('provider.dashboard') ? 'active' : '' }}">
            <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('provider.scholarships.index') }}" class="nav-link {{ request()->routeIs('provider.scholarships.*') ? 'active' : '' }}">
            <i class="ti ti-book-2" style="font-size: 18px;"></i>
            <span>My Scholarships</span>
        </a>

        <a href="{{ route('provider.applications.index') }}" class="nav-link {{ request()->routeIs('provider.applications.*') ? 'active' : '' }}">
            <i class="ti ti-inbox" style="font-size: 18px;"></i>
            <span>Applications</span>
        </a>

        <a href="{{ route('provider.organization.edit') }}" class="nav-link {{ request()->routeIs('provider.organization.*') ? 'active' : '' }}">
            <i class="ti ti-building" style="font-size: 18px;"></i>
            <span>Organization</span>
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

<div class="provider-content">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="page-title">Applicants</h1>
                <p class="text-muted">Review submitted scholarship applications from your organization.</p>
            </div>
        </div>

        <!-- Pending Applications Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="mb-3" style="color: #534AB7; font-weight: 700; font-size: 1.3rem;">
                    <i class="ti ti-clock me-2"></i>Pending Applications
                    <span class="badge bg-warning">{{ $pendingApplications->total() }}</span>
                </h3>

                <div class="row g-3">
                    @forelse($pendingApplications as $application)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ $application->student->name }}</h5>
                                        <p class="text-muted small">{{ $application->student->email }}</p>
                                        <p class="mt-2 small">Applied for <strong>{{ $application->scholarship->title }}</strong></p>
                                    </div>
                                    <div class="d-flex gap-2 align-items-start">
                                        <span class="badge bg-warning">{{ ucfirst($application->status) }}</span>
                                        <a href="{{ route('provider.applications.show', $application) }}" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-muted">
                                    No pending applications. All current submissions have been reviewed.
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if($pendingApplications->hasPages())
                    <div class="mt-4">
                        {{ $pendingApplications->render() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Approved Applications Section -->
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3" style="color: #22c55e; font-weight: 700; font-size: 1.3rem;">
                    <i class="ti ti-check-circle me-2"></i>Approved Applications
                    <span class="badge bg-success">{{ $approvedApplications->total() }}</span>
                </h3>

                <div class="row g-3">
                    @forelse($approvedApplications as $application)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ $application->student->name }}</h5>
                                        <p class="text-muted small">{{ $application->student->email }}</p>
                                        <p class="mt-2 small">Applied for <strong>{{ $application->scholarship->title }}</strong></p>
                                    </div>
                                    <div class="d-flex gap-2 align-items-start">
                                        <span class="badge bg-success">{{ ucfirst($application->status) }}</span>
                                        <a href="{{ route('provider.applications.show', $application) }}" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-muted">
                                    No approved applications yet.
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if($approvedApplications->hasPages())
                    <div class="mt-4">
                        {{ $approvedApplications->render() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Rejected Applications Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-3" style="color: #ef4444; font-weight: 700; font-size: 1.3rem;">
                    <i class="ti ti-x-circle me-2"></i>Rejected Applications
                    <span class="badge bg-danger">{{ $rejectedApplications->total() }}</span>
                </h3>

                <div class="row g-3">
                    @forelse($rejectedApplications as $application)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ $application->student->name }}</h5>
                                        <p class="text-muted small">{{ $application->student->email }}</p>
                                        <p class="mt-2 small">Applied for <strong>{{ $application->scholarship->title }}</strong></p>
                                    </div>
                                    <div class="d-flex gap-2 align-items-start">
                                        <span class="badge bg-danger">{{ ucfirst($application->status) }}</span>
                                        <a href="{{ route('provider.applications.show', $application) }}" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-muted">
                                    No rejected applications.
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if($rejectedApplications->hasPages())
                    <div class="mt-4">
                        {{ $rejectedApplications->render() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
