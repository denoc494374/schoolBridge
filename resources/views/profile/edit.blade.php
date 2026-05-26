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

    .profile-sidebar {
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

    .profile-sidebar h3 {
        font-family: 'Fraunces', serif;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
    }

    .profile-content {
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

    .page-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
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

    .form-label {
        color: var(--navy);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control, textarea.form-control, select.form-control {
        border: 0.5px solid var(--border);
        border-radius: 10px;
        padding: 11px 14px;
        color: var(--text);
        background: #fff;
    }

    .form-control:focus, textarea.form-control:focus, select.form-control:focus {
        border-color: var(--navy);
        box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
    }
</style>

<div class="profile-sidebar">
    <h3>
        <i class="ti ti-user"></i>
        <span>Profile</span>
    </h3>

    <nav style="display: flex; flex-direction: column; gap: 8px;">
        @if(auth()->user()->hasRole('student'))
            <a href="{{ route('student.dashboard') }}" class="nav-link">
                <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
                <span>Dashboard</span>
            </a>
        @elseif(auth()->user()->hasRole('provider'))
            <a href="{{ route('provider.dashboard') }}" class="nav-link">
                <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
                <span>Dashboard</span>
            </a>
        @elseif(auth()->user()->hasRole('admin'))
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
                <span>Dashboard</span>
            </a>
        @endif

        <a href="{{ route('profile.edit') }}" class="nav-link active">
            <i class="ti ti-settings" style="font-size: 18px;"></i>
            <span>Settings</span>
        </a>
    </nav>
</div>

<div class="profile-content">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="page-title">
                    <i class="ti ti-user me-3"></i>Profile Settings
                </h1>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                @if(auth()->user()->hasRole('student'))
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-student-profile-form')
                        </div>
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="card border-danger">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('profile.partials.confirm-delete-modal')
</x-app-layout>
