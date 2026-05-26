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

    .card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.6;
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
    .badge.bg-secondary { background: var(--text-muted) !important; color: white !important; }

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

    .page-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 1.8rem;
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

<div class="student-content">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('student.applications.index') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left me-1"></i>Back
                        </a>
                        <h1 class="page-title mb-0">Application Details</h1>
                    </div>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete this application">
                        <i class="ti ti-trash me-1"></i>Delete Application
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Application Status -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="ti ti-clipboard-list me-2" style="color: #534AB7;"></i>Application Status
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Status</p>
                                @php
                                    $badgeClass = match($application->status) {
                                        'approved' => 'success',
                                        'pending' => 'warning',
                                        'rejected' => 'danger',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeClass }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Submitted On</p>
                                <p>{{ $application->submitted_at->format('F j, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                        @if($application->remarks)
                            <div class="row mt-3">
                                <div class="col-12">
                                    <p class="text-muted mb-1">Remarks from Provider</p>
                                    <p>{{ $application->remarks }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Scholarship Details -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="ti ti-award me-2" style="color: #534AB7;"></i>Scholarship Details
                        </h5>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-2">{{ $application->scholarship->title }}</h4>
                        <p class="text-muted small mb-3">{{ $application->scholarship->organization->name }}</p>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Deadline</p>
                                <p>{{ $application->scholarship->deadline->format('F j, Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Total Slots</p>
                                <p>{{ $application->scholarship->slots }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-muted mb-2">Description</p>
                            <p>{{ $application->scholarship->description }}</p>
                        </div>

                        @if($application->scholarship->eligibility_criteria)
                            <div class="mb-4">
                                <p class="text-muted mb-2">Eligibility Criteria</p>
                                <div class="alert alert-light border">
                                    @if(isset($application->scholarship->eligibility_criteria['courses']) && !empty($application->scholarship->eligibility_criteria['courses']))
                                        <p class="mb-2"><strong>Eligible Courses:</strong></p>
                                        <ul class="mb-3">
                                            @foreach($application->scholarship->eligibility_criteria['courses'] as $course)
                                                <li>{{ $course }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @if(isset($application->scholarship->eligibility_criteria['locations']) && !empty($application->scholarship->eligibility_criteria['locations']))
                                        <p class="mb-2"><strong>Eligible Locations:</strong></p>
                                        <ul>
                                            @foreach($application->scholarship->eligibility_criteria['locations'] as $location)
                                                <li>{{ $location }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Application Documents -->
            @if($application->documents->count() > 0)
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">
                                <i class="ti ti-file-text me-2" style="color: #534AB7;"></i>Submitted Documents
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @foreach($application->documents as $document)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-1">
                                                <i class="ti ti-{{ str_ends_with($document->document_type, 'pdf') ? 'file-pdf' : 'file' }} me-2"></i>
                                                {{ basename($document->file_path) }}
                                            </p>
                                            <small class="text-muted">{{ $document->uploaded_at->format('F j, Y \a\t g:i A') }}</small>
                                        </div>
                                        <a href="{{ URL::signedRoute('documents.download', ['document' => $document->id]) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-download me-1"></i>Download
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</x-app-layout>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-danger">
                <h5 class="modal-title">
                    <i class="ti ti-alert-circle text-danger me-2"></i>Delete Application
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Are you sure you want to delete this application? This action cannot be undone.</p>
                <div class="alert alert-warning mb-0">
                    <strong>Warning:</strong> Deleting your application will remove all associated documents and cannot be recovered.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('student.applications.destroy', $application) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="ti ti-trash me-1"></i>Delete Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
