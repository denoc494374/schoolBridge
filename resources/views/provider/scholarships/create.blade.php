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

    /* ── FORM STYLING ── */
    .form-container {
        max-width: 700px;
        margin: 0 auto;
    }

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
        margin-bottom: 1rem;
    }

    .form-intro {
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.7;
        margin-bottom: 2.5rem;
    }

    .form-card {
        background: #fff;
        border: 0.5px solid var(--border);
        border-radius: var(--radius);
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .form-section {
        margin-bottom: 2rem;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

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
        font-family: 'DM Sans', sans-serif;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--text-muted);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-row.full {
        grid-template-columns: 1fr;
    }

    .form-hint {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin-top: 0.5rem;
    }

    .error-message {
        font-size: 0.85rem;
        color: #ef4444;
        margin-top: 0.5rem;
    }

    .section-divider {
        height: 1px;
        background: var(--border);
        margin: 2rem 0;
    }

    .section-subtitle {
        font-family: 'Fraunces', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--gold-light);
    }

    /* ── BUTTONS ── */
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

        .form-row {
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
        <div class="form-container">
            <div class="section-label">New Scholarship</div>
            <h1>Create a New Scholarship</h1>
            <p class="form-intro">Define the details of your scholarship program, eligibility requirements, and application timeline.</p>

            <div class="form-card">
                <form method="POST" action="{{ route('provider.scholarships.store') }}">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="form-section">
                        <div class="section-subtitle">Basic Information</div>

                        <div class="form-group">
                            <label for="title">Scholarship Title *</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g., Engineering Excellence Award" required autofocus />
                            @if($errors->has('title'))
                                <div class="error-message">{{ $errors->first('title') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea id="description" name="description" placeholder="Describe your scholarship program, what makes it special, and what recipients can expect...">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="error-message">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="slots">Available Slots *</label>
                                <input type="number" id="slots" name="slots" value="{{ old('slots', 1) }}" min="1" placeholder="Number of scholarships" required />
                                @if($errors->has('slots'))
                                    <div class="error-message">{{ $errors->first('slots') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="deadline">Application Deadline *</label>
                                <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}" required />
                                @if($errors->has('deadline'))
                                    <div class="error-message">{{ $errors->first('deadline') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Eligibility Criteria Section -->
                    <div class="form-section">
                        <div class="section-subtitle">Eligibility Criteria</div>

                        <div class="form-group">
                            <label for="locations">Eligible Locations</label>
                            <input type="text" id="locations" name="eligibility_criteria[locations]" value="{{ old('eligibility_criteria.locations') }}" placeholder="e.g., Manila, Cebu, Davao (comma-separated)" />
                            <div class="form-hint">Separate multiple locations with commas</div>
                            @if($errors->has('eligibility_criteria.locations'))
                                <div class="error-message">{{ $errors->first('eligibility_criteria.locations') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="courses">Eligible Courses</label>
                            <input type="text" id="courses" name="eligibility_criteria[courses]" value="{{ old('eligibility_criteria.courses') }}" placeholder="e.g., Computer Science, Engineering, Business (comma-separated)" />
                            <div class="form-hint">Separate multiple courses with commas</div>
                            @if($errors->has('eligibility_criteria.courses'))
                                <div class="error-message">{{ $errors->first('eligibility_criteria.courses') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="year_level">Required Year Level(s) *</label>
                            <select id="year_level" name="eligibility_criteria[year_levels][]" multiple required>
                                <option value="1st Year" {{ in_array('1st Year', (array)old('eligibility_criteria.year_levels', [])) ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ in_array('2nd Year', (array)old('eligibility_criteria.year_levels', [])) ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ in_array('3rd Year', (array)old('eligibility_criteria.year_levels', [])) ? 'selected' : '' }}>3rd Year</option>
                                <option value="4th Year" {{ in_array('4th Year', (array)old('eligibility_criteria.year_levels', [])) ? 'selected' : '' }}>4th Year</option>
                            </select>
                            <div class="form-hint">Select one or more year levels (hold Ctrl/Cmd to select multiple)</div>
                            @if($errors->has('eligibility_criteria.year_levels'))
                                <div class="error-message">{{ $errors->first('eligibility_criteria.year_levels') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="min_gpa">Minimum GPA</label>
                            <input type="number" id="min_gpa" step="0.01" min="0" max="4" name="eligibility_criteria[min_gpa]" value="{{ old('eligibility_criteria.min_gpa') }}" placeholder="e.g., 3.5" />
                            <div class="form-hint">Leave blank for no GPA requirement (0.0 - 4.0)</div>
                            @if($errors->has('eligibility_criteria.min_gpa'))
                                <div class="error-message">{{ $errors->first('eligibility_criteria.min_gpa') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('provider.scholarships.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-check"></i>
                            Create Scholarship
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
