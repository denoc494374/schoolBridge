<x-app-layout>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

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
    color: var(--text);
    line-height: 1.6;
  }

  .student-container {
    display: flex;
    margin-top: 0;
    min-height: 100vh;
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

  .student-content {
    flex: 1;
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

  .page-title {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 32px;
    display: flex;
    align-items: center;
    gap: 12px;
    letter-spacing: -0.02em;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    margin-bottom: 40px;
  }

  .stat-card {
    background: #fff;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 28px 24px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
    overflow: hidden;
    position: relative;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--navy);
  }

  .stat-card:nth-child(2)::before {
    background: var(--gold);
  }

  .stat-card:nth-child(3)::before {
    background: #22c55e;
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 28px rgba(13,31,60,0.1);
  }

  .stat-icon {
    font-size: 2.5rem;
    margin-bottom: 16px;
    opacity: 0.8;
  }

  .stat-number {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 600;
    color: var(--navy);
    line-height: 1;
    margin-bottom: 8px;
  }

  .stat-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 500;
  }

  .quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 40px;
  }

  .action-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    padding: 24px;
    background: white;
    border: 2px solid var(--border);
    border-radius: var(--radius);
    text-decoration: none;
    color: var(--navy);
    transition: all 0.2s ease;
    font-weight: 500;
    text-align: center;
  }

  .action-btn:hover {
    border-color: var(--gold);
    background: var(--navy-light);
    transform: translateY(-2px);
  }

  .action-btn i {
    font-size: 2rem;
    color: var(--gold);
  }

  .info-section {
    background: white;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 32px;
    margin-bottom: 24px;
  }

  .section-title {
    font-family: 'Fraunces', serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .section-title i {
    color: var(--gold);
    font-size: 1.5rem;
  }

  .feature-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .feature-item {
    display: flex;
    gap: 16px;
    padding: 16px;
    background: var(--navy-light);
    border-radius: 12px;
    border-left: 4px solid var(--gold);
  }

  .feature-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(200, 148, 42, 0.1);
    border-radius: 8px;
    color: var(--gold);
    font-size: 1.2rem;
  }

  .feature-content h4 {
    margin: 0 0 4px 0;
    color: var(--navy);
    font-size: 0.95rem;
    font-weight: 600;
  }

  .feature-content p {
    margin: 0;
    color: var(--text-muted);
    font-size: 0.85rem;
  }

  .page-subtitle {
    color: var(--text-muted);
    margin-bottom: 32px;
    font-size: 0.95rem;
  }
</style>

<div class="student-container">
    <!-- Left Sidebar -->
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
            <a href="{{ route('student.dashboard') }}" 
               class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('student.scholarships.index') }}" 
               class="nav-link {{ request()->routeIs('student.scholarships.index') ? 'active' : '' }}">
                <i class="ti ti-award" style="font-size: 18px;"></i>
                <span>Available</span>
            </a>

            <a href="{{ route('student.applications.index') }}" 
               class="nav-link {{ request()->routeIs('student.applications.index') && !request('status') ? 'active' : '' }}">
                <i class="ti ti-clipboard-list" style="font-size: 18px;"></i>
                <span>My Applications</span>
            </a>

            <a href="{{ route('student.applications.index', ['status' => 'approved']) }}" 
               class="nav-link {{ request('status') === 'approved' ? 'active' : '' }}" style="position: relative; display: flex; align-items: center; gap: 12px;">
                <div style="position: relative; width: 28px; height: 28px; flex-shrink: 0;">
                    <div style="width: 28px; height: 28px; border: 1.5px solid rgba(255,255,255,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="ti ti-check" style="font-size: 14px; color: rgba(255,255,255,0.7);"></i>
                    </div>
                </div>
                <span>Approved Application</span>
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

    <!-- Main Content -->
    <div class="student-content">
        <div style="margin-bottom: 40px;">
            <h1 class="page-title">
                <i class="ti ti-user-graduate"></i>
                Welcome back, {{ Auth::user()->name }}!
            </h1>
            <p class="page-subtitle">Find and apply for scholarships that match your profile</p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="ti ti-award" style="color: var(--navy);"></i>
                </div>
                <div class="stat-number" style="color: var(--navy);">{{ $stats['scholarships'] ?? 0 }}</div>
                <div class="stat-label">Available Scholarships</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="ti ti-clipboard-list" style="color: var(--gold);"></i>
                </div>
                <div class="stat-number" style="color: var(--gold);">{{ $stats['applications'] ?? 0 }}</div>
                <div class="stat-label">My Applications</div>
            </div>

            <div class="stat-card">
                <div style="width: 50px; height: 50px; border: 2px solid #22c55e; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <i class="ti ti-check" style="color: #22c55e; font-size: 1.5rem;"></i>
                </div>
                <div class="stat-number" style="color: #22c55e;">{{ $stats['approved'] ?? 0 }}</div>
                <div class="stat-label">Approved</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <h2 style="font-family: 'Fraunces', serif; font-size: 1.2rem; color: var(--navy); margin-bottom: 16px;">Quick Actions</h2>
        <div class="quick-actions">
            <a href="{{ route('student.scholarships.index') }}" class="action-btn">
                <i class="ti ti-search"></i>
                <span>Find Scholarships</span>
            </a>
            <a href="{{ route('student.applications.index') }}" class="action-btn">
                <i class="ti ti-clipboard-list"></i>
                <span>My Applications</span>
            </a>
            <a href="{{ route('student.applications.index', ['status' => 'approved']) }}" class="action-btn" style="position: relative; padding-top: 50px;">
                <div style="position: absolute; top: 12px; left: 50%; transform: translateX(-50%); width: 40px; height: 40px; border: 2px solid var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="ti ti-check" style="color: var(--gold); font-size: 1.2rem;"></i>
                </div>
                <i class="ti ti-check-circle"></i>
                <span>Approved Applications</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="action-btn">
                <i class="ti ti-user"></i>
                <span>Edit Profile</span>
            </a>
        </div>

        <!-- About ScholarBridge -->
        <div class="info-section">
            <div class="section-title">
                <i class="ti ti-info-circle"></i>
                About ScholarBridge
            </div>
            <p style="color: var(--text-muted); line-height: 1.8; margin-bottom: 20px;">
                ScholarBridge is your gateway to financial opportunities. We connect Filipino students with scholarships from government agencies, corporations, educational institutions, and non-profit organizations across the country.
            </p>
            <p style="color: var(--text-muted); line-height: 1.8;">
                Whether you need tuition assistance, living allowances, or merit-based support, you'll find verified scholarship opportunities that match your academic achievements and financial situation.
            </p>
        </div>

        <!-- Getting Started -->
        <div class="info-section">
            <div class="section-title">
                <i class="ti ti-rocket"></i>
                Getting Started
            </div>
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-icon">1</div>
                    <div class="feature-content">
                        <h4>Complete Your Profile</h4>
                        <p>Update your profile with your age, year level, and address. Providers use this information to evaluate your eligibility.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">2</div>
                    <div class="feature-content">
                        <h4>Browse Available Scholarships</h4>
                        <p>Explore all available scholarships and filter by your preferences. Read requirements and deadlines carefully before applying.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">3</div>
                    <div class="feature-content">
                        <h4>Submit Your Application</h4>
                        <p>Complete the application form and upload required documents. Double-check everything before submitting.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">4</div>
                    <div class="feature-content">
                        <h4>Wait for Decision</h4>
                        <p>Track your application status in real-time. Providers will review and notify you of their decision.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips for Success -->
        <div class="info-section">
            <div class="section-title">
                <i class="ti ti-bulb"></i>
                Tips for Scholarship Success
            </div>
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-file-text"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Prepare Quality Documents</h4>
                        <p>Have clear scans or photos of your documents ready. Good quality documents increase your chances of approval.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-checklist"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Read Requirements Carefully</h4>
                        <p>Make sure you meet all the eligibility criteria before applying. Incomplete applications may be rejected.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-calendar"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Don't Miss Deadlines</h4>
                        <p>Submit your applications well before the deadline. Late submissions won't be accepted by providers.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-inbox"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Apply to Multiple Scholarships</h4>
                        <p>Increase your chances by applying to multiple opportunities. Each scholarship has different criteria.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-user"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Keep Your Profile Updated</h4>
                        <p>Update your information regularly. New scholarships may match your latest achievements and status.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-message"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Communicate with Providers</h4>
                        <p>If you have questions, reach out to providers. They can help clarify requirements or your application status.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Available -->
        <div class="info-section">
            <div class="section-title">
                <i class="ti ti-sparkles"></i>
                ScholarBridge Features
            </div>
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-search"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Advanced Scholarship Search</h4>
                        <p>Easily find scholarships that match your profile, year level, and academic goals.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-building"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Verified Providers</h4>
                        <p>All scholarship providers on ScholarBridge are verified and legitimate. Apply with confidence.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-check-circle"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Real-time Application Tracking</h4>
                        <p>Monitor your application status from submission to decision. Know exactly where you stand.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-file"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Simple Document Upload</h4>
                        <p>Submit all required documents directly through the platform. Keep everything organized in one place.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
