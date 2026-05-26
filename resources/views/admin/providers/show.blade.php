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

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1031;
        background: rgba(253, 250, 244, 0.88);
        backdrop-filter: blur(12px);
        border-bottom: 0.5px solid var(--border);
    }

    .admin-sidebar {
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
    }

    .admin-sidebar h3 {
        font-family: 'Fraunces', serif;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
    }

    .admin-content {
        margin-left: 260px;
        padding: 40px;
        background: var(--cream);
        min-height: calc(100vh - 70px);
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
    }

    .card-header {
        background: var(--cream);
        border: none;
        padding: 20px;
    }

    .card-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
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

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        background: #fff;
    }

    .card-header {
        background: var(--cream);
        border: none;
        padding: 20px;
    }

    .card-body {
        padding: 24px;
    }

    .card-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
    }

    .card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    .page-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
    }

    .badge {
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 6px;
        font-size: 0.85rem;
    }

    .badge.bg-success { background: #10b981 !important; color: white !important; }
    .badge.bg-warning { background: #f59e0b !important; color: white !important; }
    .badge.bg-danger { background: #ef4444 !important; color: white !important; }

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

<div class="admin-sidebar">
    <h3>
        <i class="ti ti-shield-check"></i>
        <span>Admin</span>
    </h3>

    <nav style="display: flex; flex-direction: column; gap: 8px;">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.providers.index') }}" class="nav-link {{ request()->routeIs('admin.providers.*') ? 'active' : '' }}">
            <i class="ti ti-building" style="font-size: 18px;"></i>
            <span>Providers</span>
        </a>
    </nav>
</div>

<div class="admin-content">

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div>
                            <h1 class="card-title">{{ $organization->name }}</h1>
                            <p class="text-muted">{{ $organization->contact_email }}</p>
                        </div>
                        @if($organization->verified_at)
                            <span class="badge bg-success">Verified</span>
                        @else
                            <span class="badge bg-warning">Pending Verification</span>
                        @endif
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Organization Details</h6>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-3 fw-bold">Name</dt>
                            <dd class="col-sm-9">{{ $organization->name }}</dd>
                            <dt class="col-sm-3 fw-bold">Address</dt>
                            <dd class="col-sm-9">{{ $organization->address }}</dd>
                            <dt class="col-sm-3 fw-bold">Contact Email</dt>
                            <dd class="col-sm-9">{{ $organization->contact_email }}</dd>
                            <dt class="col-sm-3 fw-bold">Registered</dt>
                            <dd class="col-sm-9">{{ $organization->created_at->format('F j, Y H:i') }}</dd>
                            @if($organization->verified_at)
                                <dt class="col-sm-3 fw-bold">Verified</dt>
                                <dd class="col-sm-9">{{ $organization->verified_at->format('F j, Y H:i') }}</dd>
                            @endif
                        </dl>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Account Owner</h6>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-3 fw-bold">Name</dt>
                            <dd class="col-sm-9">{{ $organization->user->name }}</dd>
                            <dt class="col-sm-3 fw-bold">Email</dt>
                            <dd class="col-sm-9">{{ $organization->user->email }}</dd>
                            <dt class="col-sm-3 fw-bold">Email Verified</dt>
                            <dd class="col-sm-9">{{ $organization->user->email_verified_at ? 'Yes' : 'No' }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Scholarships</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">{{ $organization->scholarships->count() }} total</p>
                        @if($organization->scholarships->count())
                            <ul class="list-unstyled">
                                @foreach($organization->scholarships as $scholarship)
                                    <li class="small mb-2">{{ $scholarship->title }} <span class="badge bg-secondary">{{ ucfirst($scholarship->status) }}</span></li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted small">No scholarships yet.</p>
                        @endif
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-between">
                    <a href="{{ route('admin.providers.index') }}" class="btn btn-outline-secondary">Back</a>
                    <div class="d-flex gap-2">
                        @if(! $organization->verified_at)
                            <form method="POST" action="{{ route('admin.providers.verify', $organization) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Verify Provider</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.providers.revoke', $organization) }}" class="d-inline" onsubmit="return confirm('Revoke verification?');">
                                @csrf
                                <button type="submit" class="btn btn-danger">Revoke Verification</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
