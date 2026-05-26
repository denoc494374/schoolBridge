<x-app-layout>
<style>
    :root {
        --gold: #C8942A;
        --navy: #0D1F3C;
        --cream: #FDFAF4;
        --text-muted: #4A5A78;
        --border: rgba(13, 31, 60, 0.12);
        --radius: 16px;
        --success: #10b981;
        --warning: #f59e0b;
        --error: #ef4444;
    }

    * {
        box-sizing: border-box;
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

    /* ── MAIN CONTENT ── */
    .form-container {
        max-width: 820px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 40px;
        padding-bottom: 24px;
        border-bottom: 2px solid var(--gold);
    }

    .page-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--gold), #d4a574);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        flex-shrink: 0;
    }

    .page-title-group {
        flex: 1;
    }

    .page-title {
        font-family: 'Fraunces', serif;
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 6px;
        letter-spacing: -0.01em;
    }

    .page-subtitle {
        font-size: 0.9rem;
        color: var(--text-muted);
        font-weight: 400;
    }

    /* ── FORM SECTIONS ── */
    .form-section {
        background: white;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 32px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        transition: all 0.3s ease;
    }

    .form-section:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 28px;
        padding-bottom: 16px;
        border-bottom: 2px solid var(--border);
    }

    .section-icon {
        width: 36px;
        height: 36px;
        background: rgba(200, 148, 42, 0.15);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gold);
        font-size: 18px;
        flex-shrink: 0;
    }

    .section-title {
        font-family: 'Fraunces', serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 0;
        letter-spacing: -0.01em;
    }

    /* ── FORM GROUPS ── */
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 24px;
    }

    .form-row.full {
        grid-template-columns: 1fr;
    }

    .form-row.two-cols {
        grid-template-columns: repeat(2, 1fr);
    }

    .form-group {
        margin-bottom: 0;
        position: relative;
    }

    .form-label-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .form-label {
        display: block;
        color: var(--navy);
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: -0.01em;
    }

    .form-label-icon {
        width: 20px;
        height: 20px;
        background: rgba(200, 148, 42, 0.12);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gold);
        font-size: 12px;
        flex-shrink: 0;
    }

    .form-input, textarea, select {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        font-size: 0.95rem;
        color: var(--navy);
        background: #fff;
        font-family: 'DM Sans', sans-serif;
        transition: all 0.2s ease;
    }

    .form-input::placeholder, textarea::placeholder {
        color: var(--text-muted);
        opacity: 0.7;
    }

    .form-input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 4px rgba(200, 148, 42, 0.1);
        background: #fafbfc;
    }

    textarea {
        resize: vertical;
        min-height: 130px;
    }

    .form-hint {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .form-hint::before {
        content: 'i';
        display: inline-flex;
        width: 16px;
        height: 16px;
        background: rgba(74, 90, 120, 0.1);
        border-radius: 50%;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        flex-shrink: 0;
    }

    .error-message {
        color: var(--error);
        font-size: 0.8rem;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .error-message::before {
        content: '!';
        font-size: 13px;
        flex-shrink: 0;
    }

    /* ── BUTTONS ── */
    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1.5px solid var(--border);
    }

    .btn {
        padding: 12px 28px;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        letter-spacing: -0.01em;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--navy), #1a2d4f);
        color: white;
        box-shadow: 0 4px 14px rgba(13, 31, 60, 0.18);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #1a2d4f, #0f1a2d);
        box-shadow: 0 6px 20px rgba(13, 31, 60, 0.25);
        transform: translateY(-2px);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-secondary {
        border: 1.5px solid var(--border);
        color: var(--navy);
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .btn-secondary:hover {
        border-color: var(--navy);
        background: #f8fafb;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
        .provider-content {
            margin-left: 0;
            padding: 20px;
        }

        footer {
            margin-left: 0;
        }

        .provider-sidebar {
            width: 100%;
            height: auto;
            position: relative;
            border-right: none;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .form-row.two-cols {
            grid-template-columns: 1fr;
        }

        .form-section {
            padding: 20px;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .page-title {
            font-size: 1.4rem;
        }

        .form-actions {
            flex-direction: column-reverse;
            gap: 10px;
        }

        .btn {
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
                <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="user-actions">
                <a href="{{ route('profile.edit') }}" class="user-btn" title="Profile">
                    <i class="ti ti-user" style="font-size: 14px;"></i>
                    <span>Profile</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" style="flex: 1; display: contents;">
                    @csrf
                    <button type="submit" class="user-btn" style="width: 100%; margin: 0;" title="Logout">
                        <i class="ti ti-logout" style="font-size: 14px;"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="provider-content">
        <div class="form-container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-icon">
                    <i class="ti ti-edit"></i>
                </div>
                <div class="page-title-group">
                    <h1 class="page-title">Update Scholarship</h1>
                    <p class="page-subtitle">Modify scholarship details, eligibility criteria, and application settings</p>
                </div>
            </div>

            <form method="POST" action="{{ route('provider.scholarships.update', $scholarship) }}">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="ti ti-info-circle"></i>
                        </div>
                        <h2 class="section-title">Basic Information</h2>
                    </div>

                    <div class="form-row full">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Scholarship Title</span>
                                <div class="form-label-icon"><i class="ti ti-heading"></i></div>
                            </div>
                            <input 
                                type="text" 
                                name="title" 
                                class="form-input @error('title') border-red-500 @enderror" 
                                value="{{ old('title', $scholarship->title) }}" 
                                placeholder="E.g., Merit Excellence Scholarship 2024"
                                required 
                                autofocus
                            />
                            <div class="form-hint">Give your scholarship a clear, descriptive title</div>
                            @error('title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row full">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Description</span>
                                <div class="form-label-icon"><i class="ti ti-file-text"></i></div>
                            </div>
                            <textarea 
                                name="description" 
                                class="form-input @error('description') border-red-500 @enderror"
                                placeholder="Describe the scholarship, its purpose, selection criteria, and what makes it unique..."
                                required
                            >{{ old('description', $scholarship->description) }}</textarea>
                            <div class="form-hint">Provide detailed information to help students understand this opportunity</div>
                            @error('description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Application Details Section -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="ti ti-calendar"></i>
                        </div>
                        <h2 class="section-title">Application Details</h2>
                    </div>

                    <div class="form-row two-cols">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Available Slots</span>
                                <div class="form-label-icon"><i class="ti ti-users"></i></div>
                            </div>
                            <input 
                                type="number" 
                                name="slots" 
                                class="form-input @error('slots') border-red-500 @enderror"
                                value="{{ old('slots', $scholarship->slots) }}" 
                                min="1"
                                placeholder="10"
                                required
                            />
                            <div class="form-hint">Number of scholarships available</div>
                            @error('slots')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Application Deadline</span>
                                <div class="form-label-icon"><i class="ti ti-clock"></i></div>
                            </div>
                            <input 
                                type="date" 
                                name="deadline" 
                                class="form-input @error('deadline') border-red-500 @enderror"
                                value="{{ old('deadline', $scholarship->deadline->format('Y-m-d')) }}" 
                                required
                            />
                            <div class="form-hint">When applications close</div>
                            @error('deadline')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Eligibility Criteria Section -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="ti ti-certificate"></i>
                        </div>
                        <h2 class="section-title">Eligibility Criteria</h2>
                    </div>

                    <div class="form-row full">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Eligible Locations</span>
                                <div class="form-label-icon"><i class="ti ti-map-pin"></i></div>
                            </div>
                            <input 
                                type="text" 
                                name="eligibility_criteria[locations]" 
                                class="form-input @error('eligibility_criteria.locations') border-red-500 @enderror"
                                value="{{ old('eligibility_criteria.locations', implode(', ', $scholarship->eligibility_criteria['locations'] ?? [])) }}"
                                placeholder="E.g., California, New York, Texas"
                            />
                            <div class="form-hint">Separate multiple locations with commas</div>
                            @error('eligibility_criteria.locations')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row full">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Eligible Courses/Fields</span>
                                <div class="form-label-icon"><i class="ti ti-book"></i></div>
                            </div>
                            <input 
                                type="text" 
                                name="eligibility_criteria[courses]" 
                                class="form-input @error('eligibility_criteria.courses') border-red-500 @enderror"
                                value="{{ old('eligibility_criteria.courses', implode(', ', $scholarship->eligibility_criteria['courses'] ?? [])) }}"
                                placeholder="E.g., Computer Science, Engineering, Business"
                            />
                            <div class="form-hint">Separate multiple courses/fields with commas</div>
                            @error('eligibility_criteria.courses')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row full">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Year Level</span>
                                <div class="form-label-icon"><i class="ti ti-school"></i></div>
                            </div>
                            <select 
                                name="eligibility_criteria[year_levels][]" 
                                class="form-input @error('eligibility_criteria.year_levels') border-red-500 @enderror"
                                multiple
                            >
                                <option value="1st Year" {{ in_array('1st Year', (array)($scholarship->year_level ?? [])) ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ in_array('2nd Year', (array)($scholarship->year_level ?? [])) ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ in_array('3rd Year', (array)($scholarship->year_level ?? [])) ? 'selected' : '' }}>3rd Year</option>
                                <option value="4th Year" {{ in_array('4th Year', (array)($scholarship->year_level ?? [])) ? 'selected' : '' }}>4th Year</option>
                            </select>
                            <div class="form-hint">Select one or more year levels (hold Ctrl/Cmd to select multiple)</div>
                            @error('eligibility_criteria.year_levels')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <span class="form-label">Minimum GPA</span>
                                <div class="form-label-icon"><i class="ti ti-trending-up"></i></div>
                            </div>
                            <input 
                                type="number" 
                                step="0.01" 
                                min="0" 
                                max="4" 
                                name="eligibility_criteria[min_gpa]" 
                                class="form-input @error('eligibility_criteria.min_gpa') border-red-500 @enderror"
                                value="{{ old('eligibility_criteria.min_gpa', $scholarship->eligibility_criteria['min_gpa'] ?? '') }}"
                                placeholder="3.5"
                            />
                            <div class="form-hint">On a scale of 0-4.0</div>
                            @error('eligibility_criteria.min_gpa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('provider.scholarships.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Scholarships
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
</x-app-layout>
