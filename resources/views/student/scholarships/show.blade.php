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

    .alert-light {
        background: rgba(200, 148, 42, 0.08);
        border-color: var(--border);
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

        <a href="{{ route('student.scholarships.index') }}" class="nav-link active">
            <i class="ti ti-award" style="font-size: 18px;"></i>
            <span>Available</span>
        </a>

        <a href="{{ route('student.applications.index') }}" class="nav-link">
            <i class="ti ti-clipboard-list" style="font-size: 18px;"></i>
            <span>My Applications</span>
        </a>

        <a href="{{ route('student.applications.index', ['status' => 'approved']) }}" class="nav-link">
            <i class="ti ti-check-circle" style="font-size: 18px;"></i>
            <span>Approved</span>
        </a>
    </nav>
</div>

<div class="student-content">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Header Section -->
                <div style="margin-bottom: 40px; text-align: center;">
                    <a href="{{ route('student.scholarships.index') }}" style="display: inline-flex; align-items: center; gap: 6px; color: var(--text-muted); text-decoration: none; font-size: 0.9rem; margin-bottom: 20px; justify-content: center;">
                        <i class="ti ti-arrow-left"></i>
                        <span>Back to Scholarships</span>
                    </a>
                    
                    <h1 style="font-family: 'Fraunces', serif; font-size: 2.2rem; font-weight: 600; color: var(--navy); margin-bottom: 12px;">{{ $scholarship->title }}</h1>
                </div>

                <!-- Main Info Cards -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px; margin-bottom: 32px; max-width: 400px; margin-left: auto; margin-right: auto;">
                    <div style="background: white; border: 0.5px solid var(--border); border-radius: 12px; padding: 20px; text-align: center;">
                        <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500; margin-bottom: 8px; text-transform: uppercase;">Available Slots</div>
                        <div style="font-size: 2rem; font-weight: 600; color: var(--navy);">{{ $scholarship->slots }}</div>
                    </div>
                    <div style="background: white; border: 0.5px solid var(--border); border-radius: 12px; padding: 20px; text-align: center;">
                        <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500; margin-bottom: 8px; text-transform: uppercase;">Application Deadline</div>
                        <div style="font-size: 1.1rem; font-weight: 600; color: var(--gold);">{{ $scholarship->deadline->format('M d, Y') }}</div>
                    </div>
                </div>

                <!-- Description Section -->
                <div style="background: white; border: 0.5px solid var(--border); border-radius: 12px; padding: 28px; margin-bottom: 24px;">
                    <h2 style="font-family: 'Fraunces', serif; font-size: 1.3rem; color: var(--navy); margin-bottom: 16px; display: flex; align-items: center; gap: 10px;">
                        <i class="ti ti-info-circle" style="color: var(--gold); font-size: 1.5rem;"></i>
                        About This Scholarship
                    </h2>
                    <p style="color: var(--text-muted); line-height: 1.8; font-size: 0.95rem;">{{ $scholarship->description }}</p>
                </div>

                <!-- Eligibility Section -->
                <div style="background: white; border: 0.5px solid var(--border); border-radius: 12px; padding: 28px; margin-bottom: 24px;">
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
                            <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">{{ implode(', ', $scholarship->eligibility_criteria['locations']) }}</p>
                        </div>
                        @endif

                        @if(!empty($scholarship->eligibility_criteria['courses']))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-book" style="color: var(--gold);"></i>
                                Eligible Courses
                            </h6>
                            <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">{{ implode(', ', $scholarship->eligibility_criteria['courses']) }}</p>
                        </div>
                        @endif

                        @if(!empty($scholarship->eligibility_criteria['year_level']))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-school" style="color: var(--gold);"></i>
                                Year Level
                            </h6>
                            <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">
                                @if(is_array($scholarship->eligibility_criteria['year_level']))
                                    {{ implode(', ', $scholarship->eligibility_criteria['year_level']) }}
                                @else
                                    {{ $scholarship->eligibility_criteria['year_level'] }}
                                @endif
                            </p>
                        </div>
                        @endif

                        @if(isset($scholarship->eligibility_criteria['min_gpa']) && !empty($scholarship->eligibility_criteria['min_gpa']))
                        <div style="padding: 16px; background: rgba(200, 148, 42, 0.05); border-radius: 10px; border-left: 3px solid var(--gold);">
                            <h6 style="color: var(--navy); font-weight: 600; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <i class="ti ti-star" style="color: var(--gold);"></i>
                                Minimum GPA
                            </h6>
                            <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">{{ $scholarship->eligibility_criteria['min_gpa'] }} and above</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 12px; justify-content: space-between; align-items: center;">
                    <a href="{{ route('student.scholarships.index') }}" style="padding: 14px 28px; border: 1.5px solid var(--border); background: white; color: var(--navy); text-decoration: none; border-radius: 10px; font-weight: 500; transition: all 0.2s ease; display: flex; align-items: center; gap: 8px;">
                        <i class="ti ti-arrow-left"></i>
                        Back
                    </a>

                    @if(auth()->user()->applications()->where('scholarship_id', $scholarship->id)->exists())
                        <div style="padding: 12px 20px; background: #f59e0b; color: white; border-radius: 10px; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">
                            <i class="ti ti-check-circle"></i>
                            Already Applied
                        </div>
                    @else
                        <a href="{{ route('student.applications.create', $scholarship) }}" style="padding: 14px 28px; background: var(--navy); color: white; text-decoration: none; border-radius: 10px; font-weight: 500; transition: all 0.2s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="ti ti-send"></i>
                            Apply Now
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
