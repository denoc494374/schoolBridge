<x-app-layout>
<style>
    *, *::before, *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --gold: #C8942A;
        --gold-light: #F5E4B8;
        --gold-dark: #7A5610;
        --navy: #0D1F3C;
        --navy-mid: #1C3560;
        --navy-light: #E8EEF8;
        --cream: #FDFAF4;
        --text: #0D1F3C;
        --text-muted: #4A5A78;
        --border: rgba(13, 31, 60, 0.12);
        --radius: 16px;
        --green: #22c55e;
        --orange: #f97316;
        --red: #ef4444;
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

    .provider-content {
        flex: 1;
        margin-left: 260px;
        padding: 60px 40px;
        background: var(--cream);
    }

    .scholarbridge-footer-wrapper {
        margin-left: 260px;
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

    /* User Profile Section */
    .sidebar-user {
        margin-top: auto;
        padding-top: 24px;
        border-top: 0.5px solid rgba(255,255,255,0.1);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: var(--gold);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: var(--navy);
        font-size: 0.9rem;
    }

    .user-details {
        flex: 1;
        min-width: 0;
    }

    .user-name {
        font-size: 0.9rem;
        font-weight: 500;
        color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-email {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.6);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-actions {
        display: flex;
        gap: 8px;
    }

    .user-btn {
        flex: 1;
        padding: 8px 12px;
        background: rgba(255,255,255,0.1);
        border: none;
        border-radius: 6px;
        color: rgba(255,255,255,0.8);
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .user-btn:hover {
        background: rgba(255,255,255,0.2);
        color: #fff;
    }

    /* ── CONTENT STYLING ── */
    .section-label {
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: 1rem;
    }

    h1 {
        font-family: 'Fraunces', serif;
        font-size: 2.2rem;
        font-weight: 600;
        line-height: 1.15;
        letter-spacing: -0.015em;
        color: var(--navy);
        margin-bottom: 1.5rem;
    }

    .page-intro {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 2.5rem;
        padding: 20px;
        background: #fff;
        border: 0.5px solid var(--border);
        border-radius: var(--radius);
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: capitalize;
        display: inline-block;
    }

    .status-badge.pending {
        background: rgba(249, 115, 22, 0.15);
        color: var(--orange);
    }

    .status-badge.approved {
        background: rgba(34, 197, 94, 0.15);
        color: var(--green);
    }

    .status-badge.rejected {
        background: rgba(239, 68, 68, 0.15);
        color: var(--red);
    }

    .status-badge.shortlisted {
        background: rgba(59, 130, 246, 0.15);
        color: #3b82f6;
    }

    .container-max {
        max-width: 900px;
        margin: 0 auto;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-card {
        background: #fff;
        border: 0.5px solid var(--border);
        border-radius: var(--radius);
        padding: 28px 24px;
        transition: all 0.2s ease;
    }

    .info-card:hover {
        border-color: var(--gold);
        box-shadow: 0 4px 12px rgba(13, 31, 60, 0.08);
    }

    .info-card-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-muted);
        margin-bottom: 12px;
        font-weight: 600;
    }

    .info-card-icon {
        font-size: 24px;
        color: var(--gold);
        margin-bottom: 12px;
        display: block;
    }

    .info-card-title {
        font-family: 'Fraunces', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 8px;
    }

    .info-card-text {
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    .section-card {
        background: #fff;
        border: 0.5px solid var(--border);
        border-radius: var(--radius);
        padding: 40px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .section-title {
        font-family: 'Fraunces', serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--gold-light);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title i {
        color: var(--gold);
        font-size: 1.3rem;
    }

    /* Documents Section */
    .documents-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .document-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        background: var(--navy-light);
        border-radius: 8px;
        border: 0.5px solid rgba(13, 31, 60, 0.12);
        transition: all 0.2s ease;
    }

    .document-item:hover {
        background: rgba(13, 31, 60, 0.06);
        border-color: var(--gold);
    }

    .document-name {
        display: flex;
        align-items: center;
        gap: 12px;
        color: var(--navy);
        font-weight: 500;
        font-size: 0.95rem;
    }

    .document-name i {
        color: var(--gold);
    }

    .document-link {
        padding: 6px 12px;
        background: var(--navy);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .document-link:hover {
        background: var(--navy-mid);
        transform: translateY(-2px);
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        font-family: 'Fraunces', serif;
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--navy);
        margin-bottom: 0.6rem;
        letter-spacing: -0.01em;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.95rem;
        color: var(--text);
        border: 1px solid var(--border);
        border-radius: 10px;
        background: #fff;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--navy);
        box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--text-muted);
    }

    /* Buttons */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 0.5px solid var(--border);
    }

    .btn {
        padding: 12px 28px;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: var(--navy);
        color: #fff;
        box-shadow: 0 2px 12px rgba(13,31,60,0.18);
    }

    .btn-primary:hover {
        background: var(--navy-mid);
        box-shadow: 0 6px 20px rgba(13,31,60,0.22);
        transform: translateY(-2px);
    }

    .btn-secondary {
        border: 1.5px solid var(--border);
        color: var(--navy);
        background: transparent;
    }

    .btn-secondary:hover {
        border-color: var(--navy);
        background: var(--navy-light);
        transform: translateY(-2px);
    }

    .empty-state {
        text-align: center;
        padding: 40px 24px;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--gold);
        margin-bottom: 16px;
        opacity: 0.3;
    }

    @media (max-width: 768px) {
        .provider-sidebar {
            width: 200px;
            padding: 24px 16px;
        }

        .provider-content {
            margin-left: 200px;
            padding: 40px 24px;
        }

        h1 {
            font-size: 1.8rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn {
            width: 100%;
            justify-content: center;
        }
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
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="user-actions">
                <a href="{{ route('profile.edit') }}" class="user-btn" title="Profile">
                    <i class="ti ti-user" style="font-size: 14px;"></i>
                </a>
                <form method="POST" action="{{ route('logout') }}" style="flex: 1;">
                    @csrf
                    <button type="submit" class="user-btn" style="width: 100%;" title="Logout">
                        <i class="ti ti-logout" style="font-size: 14px;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="provider-content">
        <div class="container-max">
            <!-- Header Section -->
            <div class="section-label">Application Review</div>
            <h1>{{ $application->student->name }}</h1>

            <!-- Status Overview -->
            <div class="page-intro">
                <div style="flex: 1;">
                    <p style="margin: 0; font-size: 0.95rem; color: var(--text-muted);">
                        Applied for <strong>{{ $application->scholarship->title }}</strong>
                    </p>
                    <p style="margin: 0; font-size: 0.85rem; color: var(--text-muted); margin-top: 8px;">
                        Submitted: {{ $application->submitted_at->format('F j, Y \a\t h:i A') }}
                    </p>
                </div>
                <span class="status-badge {{ strtolower($application->status) }}">
                    {{ ucfirst($application->status) }}
                </span>
            </div>

            <!-- Information Cards -->
            <div class="info-grid">
                <div class="info-card">
                    <i class="ti ti-user info-card-icon"></i>
                    <div class="info-card-label">Student Information</div>
                    <div class="info-card-title">{{ $application->student->name }}</div>
                    <div class="info-card-text">{{ $application->student->email }}</div>
                </div>

                <div class="info-card">
                    <i class="ti ti-award info-card-icon"></i>
                    <div class="info-card-label">Scholarship</div>
                    <div class="info-card-title">{{ $application->scholarship->title }}</div>
                    <div class="info-card-text">{{ $application->scholarship->organization?->name ?? 'N/A' }}</div>
                </div>
            </div>

            <!-- Student Profile Details -->
            @if($application->student->studentProfile)
            <div class="section-card">
                <div class="section-title">
                    <i class="ti ti-school"></i>
                    Student Profile Information
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div style="padding: 16px; background: var(--navy-light); border-radius: 10px; border-left: 4px solid var(--gold);">
                        <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Age</div>
                        <div style="font-size: 1.1rem; font-weight: 600; color: var(--navy);">
                            {{ $application->student->studentProfile->age ?? 'Not provided' }} years old
                        </div>
                    </div>

                    <div style="padding: 16px; background: var(--navy-light); border-radius: 10px; border-left: 4px solid var(--gold);">
                        <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Year Level</div>
                        <div style="font-size: 1.1rem; font-weight: 600; color: var(--navy);">
                            {{ $application->student->studentProfile->year_level ?? 'Not provided' }}
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px; padding: 16px; background: var(--navy-light); border-radius: 10px; border-left: 4px solid var(--gold);">
                    <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">Address</div>
                    <div style="font-size: 0.95rem; color: var(--navy); line-height: 1.6; word-break: break-word;">
                        {{ $application->student->studentProfile->address ?? 'Not provided' }}
                    </div>
                </div>
            </div>
            @endif

            <!-- Documents Section -->
            <div class="section-card">
                <div class="section-title">
                    <i class="ti ti-file-text"></i>
                    Documents
                </div>
                @forelse($application->documents as $document)
                    <div class="documents-list">
                        <div class="document-item">
                            <div class="document-name">
                                <i class="ti ti-file-pdf"></i>
                                {{ basename($document->file_path) }}
                            </div>
                            <a href="{{ URL::temporarySignedRoute('documents.download', now()->addMinutes(15), ['document' => $document->id]) }}" class="document-link">
                                <i class="ti ti-download" style="margin-right: 4px;"></i>Download
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="ti ti-file-off"></i>
                        <p style="margin-bottom: 0;">No documents uploaded for this application.</p>
                    </div>
                @endforelse
            </div>

            <!-- Current Remarks Section -->
            <div class="section-card">
                <div class="section-title">
                    <i class="ti ti-note"></i>
                    Remarks History
                </div>
                @if($application->remarks)
                <div style="padding: 16px; background: var(--navy-light); border-radius: 10px; border-left: 4px solid var(--gold);">
                    <p style="margin: 0; color: var(--navy); line-height: 1.6;">{{ $application->remarks }}</p>
                </div>
                @else
                <div class="empty-state">
                    <p style="margin-bottom: 0; color: var(--text-muted);">No remarks have been added yet.</p>
                </div>
                @endif
            </div>

            <!-- Status Update Form -->
            <div class="section-card">
                <div class="section-title">
                    <i class="ti ti-edit"></i>
                    Update Application Status
                </div>

                <form method="POST" action="{{ route('provider.applications.update', $application) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="status">Application Status</label>
                        <select id="status" name="status" required>
                            <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>
                                Pending Review
                            </option>
                            <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>
                                Approved
                            </option>
                            <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Add Remarks</label>
                        <textarea id="remarks" name="remarks" placeholder="Add any notes or feedback about this application...">{{ old('remarks', $application->remarks) }}</textarea>
                        @error('remarks')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('provider.applications.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Back to Applications
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-check"></i>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
