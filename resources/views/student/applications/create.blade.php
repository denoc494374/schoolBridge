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

        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Apply for {{ $scholarship->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Submit your application and upload required documents.</p>

                        <form method="POST" action="{{ route('student.applications.store', $scholarship) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <x-input-label for="remarks" :value="__('Additional Remarks')" />
                                <textarea id="remarks" name="remarks" class="form-control" rows="4">{{ old('remarks') }}</textarea>
                                <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
                            </div>

                            <!-- Document Requirements Info -->
                            <div class="alert alert-info" role="alert" style="background: rgba(13, 31, 60, 0.08); border: 0.5px solid rgba(13, 31, 60, 0.12); border-left: 4px solid var(--gold); border-radius: 10px;">
                                <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 12px;">
                                    <i class="ti ti-info-circle" style="color: var(--gold); margin-right: 8px;"></i>Required Documents
                                </h6>
                                <p style="margin: 0; color: var(--text-muted); font-size: 0.85rem; margin-bottom: 12px;">
                                    Please upload the following documents to complete your application:
                                </p>
                                <ul style="margin: 0; padding-left: 20px; color: var(--text-muted); font-size: 0.9rem;">
                                    <li style="margin-bottom: 8px;">
                                        <strong>Transcript of Records (TOR) or Report Cards</strong>
                                        <br><span style="font-size: 0.85rem;">Latest official academic records from your school</span>
                                    </li>
                                    <li style="margin-bottom: 8px;">
                                        <strong>Certificate of Good Moral Character</strong>
                                        <br><span style="font-size: 0.85rem;">Character certification from your school or institution</span>
                                    </li>
                                    <li style="margin-bottom: 8px;">
                                        <strong>Proof of Identity</strong>
                                        <br><span style="font-size: 0.85rem;">Scanned copy of your Birth Certificate (PSA/NSO)</span>
                                    </li>
                                    <li style="margin-bottom: 8px;">
                                        <strong>Proof of Income</strong>
                                        <br><span style="font-size: 0.85rem;">Pay stub, ITR, or other income documentation</span>
                                    </li>
                                    <li>
                                        <strong>Certificate of Indigency</strong>
                                        <br><span style="font-size: 0.85rem;">From your barangay or local government unit</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="mb-3">
                                <x-input-label for="documents" :value="__('Upload Documents')" />
                                <input id="documents" name="documents[]" type="file" multiple class="form-control mt-2" />
                                <small class="text-muted d-block mt-2">Accepted: PDF, JPG, JPEG, PNG, DOC, DOCX. Max 10 MB each.</small>
                                <x-input-error :messages="$errors->get('documents')" class="mt-2" />
                                <x-input-error :messages="$errors->get('documents.*')" class="mt-2" />
                            </div>

                            <div class="d-flex gap-2 justify-content-between">
                                <a href="{{ route('student.scholarships.show', $scholarship) }}" class="btn btn-outline-secondary">Cancel</a>
                                <x-primary-button type="submit">Submit Application</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
