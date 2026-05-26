<x-app-layout>
<style>
    :root {
        --gold: #C8942A;
        --navy: #0D1F3C;
        --cream: #FDFAF4;
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
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Header Section -->
                <div style="margin-bottom: 40px; text-align: center;">
                    <a href="{{ route('provider.scholarships.index') }}" style="display: inline-flex; align-items: center; gap: 6px; color: #4A5A78; text-decoration: none; font-size: 0.9rem; margin-bottom: 20px;">
                        <i class="ti ti-arrow-left"></i>
                        <span>Back to Scholarships</span>
                    </a>
                    
                    <h1 style="font-family: 'Fraunces', serif; font-size: 2.2rem; font-weight: 600; color: var(--navy); margin-bottom: 12px;">{{ $scholarship->title }}</h1>
                </div>

                <!-- Main Info Cards -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px; margin-bottom: 32px; max-width: 500px; margin-left: auto; margin-right: auto;">
                    <div style="background: white; border: 0.5px solid rgba(13, 31, 60, 0.12); border-radius: 12px; padding: 20px; text-align: center;">
                        <div style="font-size: 0.75rem; color: #4A5A78; font-weight: 500; margin-bottom: 8px; text-transform: uppercase;">Total Slots</div>
                        <div style="font-size: 2rem; font-weight: 600; color: var(--navy);">{{ $scholarship->slots }}</div>
                    </div>
                    <div style="background: white; border: 0.5px solid rgba(13, 31, 60, 0.12); border-radius: 12px; padding: 20px; text-align: center;">
                        <div style="font-size: 0.75rem; color: #4A5A78; font-weight: 500; margin-bottom: 8px; text-transform: uppercase;">Filled</div>
                        <div style="font-size: 2rem; font-weight: 600; color: var(--gold);">{{ $scholarship->applications()->where('status', 'approved')->count() }}</div>
                    </div>
                    <div style="background: white; border: 0.5px solid rgba(13, 31, 60, 0.12); border-radius: 12px; padding: 20px; text-align: center;">
                        <div style="font-size: 0.75rem; color: #4A5A78; font-weight: 500; margin-bottom: 8px; text-transform: uppercase;">Deadline</div>
                        <div style="font-size: 1.1rem; font-weight: 600; color: var(--gold);">{{ $scholarship->deadline->format('M d, Y') }}</div>
                    </div>
                    <div style="background: white; border: 0.5px solid rgba(13, 31, 60, 0.12); border-radius: 12px; padding: 20px; text-align: center;">
                        <div style="font-size: 0.75rem; color: #4A5A78; font-weight: 500; margin-bottom: 8px; text-transform: uppercase;">Status</div>
                        @php
                            $approvedCount = $scholarship->applications()->where('status', 'approved')->count();
                            $isFull = $approvedCount >= $scholarship->slots;
                        @endphp
                        <div style="font-size: 1rem; font-weight: 600; color: {{ $isFull ? '#6b7280' : '#4caf50' }};">
                            {{ $isFull ? 'Closed' : 'Active' }}
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div style="background: white; border: 0.5px solid rgba(13, 31, 60, 0.12); border-radius: 12px; padding: 28px; margin-bottom: 24px;">
                    <h2 style="font-family: 'Fraunces', serif; font-size: 1.3rem; color: var(--navy); margin-bottom: 16px; display: flex; align-items: center; gap: 10px;">
                        <i class="ti ti-info-circle" style="color: var(--gold); font-size: 1.5rem;"></i>
                        About This Scholarship
                    </h2>
                    <p style="color: #4A5A78; line-height: 1.8; font-size: 0.95rem;">{{ $scholarship->description }}</p>
                </div>

                <!-- Eligibility Section -->
                <div style="background: white; border: 0.5px solid rgba(13, 31, 60, 0.12); border-radius: 12px; padding: 28px; margin-bottom: 24px;">
                    <h2 style="font-family: 'Fraunces', serif; font-size: 1.3rem; color: var(--navy); margin-bottom: 16px; display: flex; align-items: center; gap: 10px;">
                        <i class="ti ti-checklist" style="color: var(--gold); font-size: 1.5rem;"></i>
                        Eligibility Criteria
                    </h2>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
                        @if(!empty($scholarship->eligibility_criteria['locations']))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-map-pin" style="color: var(--gold);"></i>
                                Locations
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0;">{{ implode(', ', $scholarship->eligibility_criteria['locations']) }}</p>
                        </div>
                        @else
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-map-pin" style="color: var(--gold);"></i>
                                Locations
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0; font-style: italic;">Not specified</p>
                        </div>
                        @endif

                        @if(!empty($scholarship->eligibility_criteria['courses']))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-book" style="color: var(--gold);"></i>
                                Eligible Courses
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0;">{{ implode(', ', $scholarship->eligibility_criteria['courses']) }}</p>
                        </div>
                        @else
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-book" style="color: var(--gold);"></i>
                                Eligible Courses
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0; font-style: italic;">Not specified</p>
                        </div>
                        @endif

                        @if(isset($scholarship->year_level) && !empty($scholarship->year_level))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-school" style="color: var(--gold);"></i>
                                Year Level
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0;">
                                @if(is_array($scholarship->year_level))
                                    {{ implode(', ', $scholarship->year_level) }}
                                @else
                                    {{ $scholarship->year_level }}
                                @endif
                            </p>
                        </div>
                        @else
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-school" style="color: var(--gold);"></i>
                                Year Level
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0; font-style: italic;">Not specified</p>
                        </div>
                        @endif

                        @if(isset($scholarship->eligibility_criteria['min_gpa']) && !empty($scholarship->eligibility_criteria['min_gpa']))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-star" style="color: var(--gold);"></i>
                                Minimum GPA
                            </h6>
                            <p style="color: #4A5A78; font-size: 0.9rem; margin: 0;">{{ $scholarship->eligibility_criteria['min_gpa'] }} and above</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 12px; justify-content: space-between; align-items: center;">
                    <a href="{{ route('provider.scholarships.index') }}" style="padding: 14px 28px; border: 1.5px solid rgba(13, 31, 60, 0.12); background: white; color: var(--navy); text-decoration: none; border-radius: 10px; font-weight: 500; transition: all 0.2s ease; display: flex; align-items: center; gap: 8px;">
                        <i class="ti ti-arrow-left"></i>
                        Back
                    </a>

                    <a href="{{ route('provider.scholarships.edit', $scholarship) }}" style="padding: 14px 28px; background: var(--navy); color: white; text-decoration: none; border-radius: 10px; font-weight: 500; transition: all 0.2s ease; display: flex; align-items: center; gap: 8px;">
                        <i class="ti ti-edit"></i>
                        Edit Scholarship
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
