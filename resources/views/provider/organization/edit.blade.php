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
    <style>
        .org-header {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            color: white;
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 40px;
            box-shadow: 0 8px 24px rgba(13, 31, 60, 0.12);
        }

        .org-header-content {
            display: flex;
            align-items: flex-start;
            gap: 32px;
        }

        .org-icon-container {
            width: 100px;
            height: 100px;
            background: var(--gold);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 48px;
            color: white;
            box-shadow: 0 8px 16px rgba(200, 148, 42, 0.3);
        }

        .org-info h1 {
            font-family: 'Fraunces', serif;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: white;
        }

        .org-info p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin: 0;
        }

        .form-section {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(13, 31, 60, 0.06);
            border: 1px solid var(--border);
        }

        .form-section-title {
            font-family: 'Fraunces', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-section-icon {
            font-size: 24px;
            color: var(--gold);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-label .required {
            color: #e74c3c;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            color: var(--text);
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(200, 148, 42, 0.1);
        }

        .form-input:placeholder-shown {
            color: var(--text-muted);
        }

        .form-help-text {
            display: block;
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .form-error {
            border-color: #e74c3c !important;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1) !important;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .alert-box {
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 152, 0, 0.1) 100%);
            border-left: 4px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 32px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .alert-icon {
            font-size: 24px;
            color: #ffc107;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 4px;
        }

        .alert-text {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin: 0;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid var(--border);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold) 0%, #a87a20 100%);
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(200, 148, 42, 0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--navy);
            border: 1.5px solid var(--border);
            padding: 12px 32px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-secondary:hover {
            background: var(--navy-light);
            border-color: var(--navy);
        }

        @media (max-width: 768px) {
            .org-header-content {
                flex-direction: column;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .org-header {
                padding: 24px;
            }

            .form-section {
                padding: 20px;
            }

            .org-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>

    <div style="max-width: 900px; margin: 0 auto;">
        <!-- Header Section -->
        <div class="org-header">
            <div class="org-header-content">
                <div class="org-icon-container">
                    <i class="ti ti-building"></i>
                </div>
                <div class="org-info" style="flex: 1;">
                    <h1>{{ Auth::user()->organization?->name ?? 'Organization Profile' }}</h1>
                    <p>{{ Auth::user()->organization ? 'Manage your organization details' : 'Set up your organization to start posting scholarships' }}</p>
                </div>
            </div>
        </div>

        <!-- Alert if not created -->
        @if(!Auth::user()->organization)
            <div class="alert-box">
                <div class="alert-icon">
                    <i class="ti ti-alert-triangle"></i>
                </div>
                <div class="alert-content">
                    <div class="alert-title">Complete Your Organization Profile</div>
                    <p class="alert-text">Fill in your organization details to unlock the ability to post scholarships and manage applications from students.</p>
                </div>
            </div>
        @endif

        <!-- Main Form -->
        <form method="POST" action="{{ Auth::user()->organization ? route('provider.organization.update') : route('provider.organization.store') }}" id="organizationForm">
            @csrf
            @if(Auth::user()->organization)
                @method('PUT')
            @endif

            <!-- Basic Information Section -->
            <div class="form-section">
                <div class="form-section-title">
                    <span class="form-section-icon"><i class="ti ti-info-circle"></i></span>
                    <span>Basic Information</span>
                </div>

                <div class="form-row full">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Organization Name <span class="required">*</span>
                        </label>
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            class="form-input {{ $errors->has('name') ? 'form-error' : '' }}"
                            value="{{ Auth::user()->organization?->name ?? old('name') }}" 
                            placeholder="Enter your organization name"
                            required
                        />
                        @if($errors->has('name'))
                            <div class="error-message">
                                <i class="ti ti-alert-circle"></i>
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="form-help-text">This is the name students will see when browsing scholarships</span>
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="form-section">
                <div class="form-section-title">
                    <span class="form-section-icon"><i class="ti ti-mail"></i></span>
                    <span>Contact Information</span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="address" class="form-label">
                            Address <span class="required">*</span>
                        </label>
                        <input 
                            id="address" 
                            type="text" 
                            name="address" 
                            class="form-input {{ $errors->has('address') ? 'form-error' : '' }}"
                            value="{{ Auth::user()->organization?->address ?? old('address') }}" 
                            placeholder="Street, City, Country"
                            required
                        />
                        @if($errors->has('address'))
                            <div class="error-message">
                                <i class="ti ti-alert-circle"></i>
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="form-help-text">Your organization's physical location</span>
                    </div>

                    <div class="form-group">
                        <label for="contact_email" class="form-label">
                            Contact Email <span class="required">*</span>
                        </label>
                        <input 
                            id="contact_email" 
                            type="email" 
                            name="contact_email" 
                            class="form-input {{ $errors->has('contact_email') ? 'form-error' : '' }}"
                            value="{{ Auth::user()->organization?->contact_email ?? old('contact_email') }}" 
                            placeholder="contact@organization.com"
                            required
                        />
                        @if($errors->has('contact_email'))
                            <div class="error-message">
                                <i class="ti ti-alert-circle"></i>
                                {{ $errors->first('contact_email') }}
                            </div>
                        @endif
                        <span class="form-help-text">Students will use this to contact you about applications</span>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-section">
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="ti ti-check"></i>
                        {{ Auth::user()->organization ? 'Save Changes' : 'Create Organization' }}
                    </button>
                    <a href="{{ route('provider.dashboard') }}" class="btn-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>
    </div>
</div>
</x-app-layout>
