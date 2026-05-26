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
        transition: all 0.2s ease;
    }

    .card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
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

    .form-label {
        color: var(--navy);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control, select.form-control {
        border: 0.5px solid var(--border);
        border-radius: 10px;
        padding: 11px 14px;
        color: var(--text);
        background: #fff;
    }

    .form-control:focus, select.form-control:focus {
        border-color: var(--navy);
        box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
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

        <div class="row mb-4">
            <div class="col-12">
                <h1 class="page-title">Provider Management</h1>
                <p class="text-muted">Review and verify scholarship providers.</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Filters</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.providers.index') }}">
                            <div class="mb-3">
                                <x-input-label for="status" :value="__('Filter by Status')" />
                                <select id="status" name="status" class="form-control">
                                    <option value="">All</option>
                                    <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Verified</option>
                                    <option value="unverified" {{ request('status') === 'unverified' ? 'selected' : '' }}>Unverified</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="search" :value="__('Search')" />
                                <x-text-input id="search" type="text" name="search" :value="request('search')" placeholder="Name or email" />
                            </div>
                            <div class="d-grid">
                                <x-primary-button type="submit">Filter</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-3">
                    @forelse($organizations as $organization)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ $organization->name }}</h5>
                                        <p class="text-muted small mb-2">{{ $organization->contact_email }}</p>
                                        <p class="text-muted small">{{ $organization->address }}</p>
                                    </div>
                                    <div class="d-flex gap-2 align-items-start">
                                        @if($organization->verified_at)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                        <a href="{{ route('admin.providers.show', $organization) }}" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-muted">
                                    No providers match your filters.
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if($organizations->hasPages())
                    <div class="mt-4">
                        {{ $organizations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
