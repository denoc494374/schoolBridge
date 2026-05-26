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

  .provider-container {
    display: flex;
    margin-top: 0;
    min-height: 100vh;
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

  .provider-content {
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
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 24px;
    border-top: 0.5px solid rgba(255,255,255,0.1);
    background: rgba(0,0,0,0.1);
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

  .stat-card {
    background: white;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 28px 24px;
    text-align: center;
    transition: all 0.2s ease;
  }

  .stat-card:hover {
    border-color: var(--gold);
    box-shadow: 0 4px 12px rgba(13, 31, 60, 0.1);
    transform: translateY(-2px);
  }

  .stat-number {
    font-family: 'Fraunces', serif;
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 8px;
  }

  .stat-label {
    font-size: 0.9rem;
    color: var(--text-muted);
    font-weight: 500;
  }

  .stat-icon {
    font-size: 2rem;
    color: var(--gold);
    margin-bottom: 12px;
  }

  .page-title {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 8px;
  }

  .page-subtitle {
    color: var(--text-muted);
    margin-bottom: 32px;
    font-size: 0.95rem;
  }

  .quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 40px;
  }

  .action-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 20px;
    background: white;
    border: 2px solid var(--border);
    border-radius: var(--radius);
    text-decoration: none;
    color: var(--navy);
    transition: all 0.2s ease;
    font-weight: 500;
  }

  .action-btn:hover {
    border-color: var(--gold);
    background: var(--navy-light);
    transform: translateY(-2px);
  }

  .action-btn i {
    font-size: 1.5rem;
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
            <a href="{{ route('provider.dashboard') }}" 
               class="nav-link {{ request()->routeIs('provider.dashboard') ? 'active' : '' }}">
                <i class="ti ti-layout-dashboard" style="font-size: 18px;"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('provider.scholarships.index') }}" 
               class="nav-link {{ request()->routeIs('provider.scholarships.*') ? 'active' : '' }}">
                <i class="ti ti-book-2" style="font-size: 18px;"></i>
                <span>My Scholarships</span>
            </a>

            <a href="{{ route('provider.applications.index') }}" 
               class="nav-link {{ request()->routeIs('provider.applications.*') ? 'active' : '' }}">
                <i class="ti ti-inbox" style="font-size: 18px;"></i>
                <span>Applications</span>
            </a>

            <a href="{{ route('provider.organization.edit') }}" 
               class="nav-link {{ request()->routeIs('provider.organization.*') ? 'active' : '' }}">
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
        <div class="container-fluid">
            <!-- Header -->
            <div style="margin-bottom: 40px;">
                <h1 class="page-title">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="page-subtitle">Manage your scholarships and connect with deserving students</p>
            </div>

            <!-- Quick Stats -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="ti ti-book-2"></i>
                    </div>
                    <div class="stat-number">
                        {{ Auth::user()->organization?->scholarships()->with('applications')->get()->filter(function($s) { return $s->applications->where('status', 'approved')->count() < $s->slots; })->count() ?? 0 }}
                    </div>
                    <div class="stat-label">Active Scholarships</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="ti ti-inbox"></i>
                    </div>
                    <div class="stat-number">
                        {{ Auth::user()->organization?->scholarships()->with('applications')->get()->sum(function($s) { return $s->applications->count(); }) ?? 0 }}
                    </div>
                    <div class="stat-label">Total Applications</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="ti ti-circle-check"></i>
                    </div>
                    <div class="stat-number">
                        {{ Auth::user()->organization?->scholarships()->with('applications')->get()->sum(function($s) { return $s->applications->where('status', 'approved')->count(); }) ?? 0 }}
                    </div>
                    <div class="stat-label">Approved</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="ti ti-circle-x"></i>
                    </div>
                    <div class="stat-number">
                        {{ Auth::user()->organization?->scholarships()->with('applications')->get()->sum(function($s) { return $s->applications->where('status', 'rejected')->count(); }) ?? 0 }}
                    </div>
                    <div class="stat-label">Rejected</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <h2 style="font-family: 'Fraunces', serif; font-size: 1.2rem; color: var(--navy); margin-bottom: 16px;">Quick Actions</h2>
            <div class="quick-actions">
                <a href="{{ route('provider.scholarships.create') }}" class="action-btn">
                    <i class="ti ti-plus"></i>
                    <span>Create Scholarship</span>
                </a>
                <a href="{{ route('provider.applications.index') }}" class="action-btn">
                    <i class="ti ti-inbox"></i>
                    <span>Review Applications</span>
                </a>
                <a href="{{ route('provider.scholarships.index') }}" class="action-btn">
                    <i class="ti ti-book-2"></i>
                    <span>View All Scholarships</span>
                </a>
                <a href="{{ route('provider.organization.edit') }}" class="action-btn">
                    <i class="ti ti-building"></i>
                    <span>Organization Profile</span>
                </a>
            </div>

            <!-- About ScholarBridge -->
            <div class="info-section">
                <div class="section-title">
                    <i class="ti ti-info-circle"></i>
                    About ScholarBridge
                </div>
                <p style="color: var(--text-muted); line-height: 1.8; margin-bottom: 20px;">
                    ScholarBridge is a trusted platform that connects scholarship providers with deserving Filipino students. We make it easy for organizations, government agencies, and corporations to reach students who need financial support while helping students find scholarships that match their needs.
                </p>
                <p style="color: var(--text-muted); line-height: 1.8;">
                    As a provider, you can create and manage multiple scholarships, review applications from qualified students, and communicate directly with applicants through your dashboard.
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
                            <h4>Complete Your Organization Profile</h4>
                            <p>Update your organization details to build trust with students. Visit the Organization section to add your information.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">2</div>
                        <div class="feature-content">
                            <h4>Create Your First Scholarship</h4>
                            <p>Click "Create Scholarship" to set up a new scholarship offer. Add details like requirements, deadline, and number of slots.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">3</div>
                        <div class="feature-content">
                            <h4>Review Student Applications</h4>
                            <p>Students will start applying for your scholarships. Review applications and make decisions to approve, reject, or shortlist candidates.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">4</div>
                        <div class="feature-content">
                            <h4>Manage Your Scholarships</h4>
                            <p>Edit scholarship details, update availability, or close applications as needed. Your listings stay current and visible to students.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Features -->
            <div class="info-section">
                <div class="section-title">
                    <i class="ti ti-sparkles"></i>
                    Key Features for Providers
                </div>
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="ti ti-users"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Verified Student Profiles</h4>
                            <p>View complete student information including age, year level, and address to make informed decisions.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="ti ti-file"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Document Management</h4>
                            <p>Students submit required documents with their applications for easy review and verification.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="ti ti-edit"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Add Remarks & Feedback</h4>
                            <p>Leave notes and feedback on applications to track your review process and communicate with students.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="ti ti-bell"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Real-time Updates</h4>
                            <p>Get notified when students apply for your scholarships and track your application status immediately.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
