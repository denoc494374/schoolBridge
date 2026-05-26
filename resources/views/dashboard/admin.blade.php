<x-app-layout>
<style>
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

  .page-title {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
    letter-spacing: -0.02em;
  }

  .page-subtitle {
    font-size: 0.95rem;
    color: var(--text-muted);
    margin-bottom: 32px;
  }

  .admin-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }

  .stat-card {
    background: #fff;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 24px;
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

  .stat-card:nth-child(2)::before { background: var(--navy-mid); }
  .stat-card:nth-child(3)::before { background: var(--gold); }
  .stat-card:nth-child(4)::before { background: var(--navy); }
  .stat-card:nth-child(5)::before { background: var(--gold); }
  .stat-card:nth-child(6)::before { background: #F97316; }
  .stat-card:nth-child(7)::before { background: #10B981; }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 28px rgba(13,31,60,0.1);
  }

  .stat-icon {
    font-size: 2rem;
    margin-bottom: 12px;
    opacity: 0.8;
  }

  .stat-label {
    font-size: 0.8rem;
    color: var(--text-muted);
    font-weight: 500;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .stat-value {
    font-family: 'Fraunces', serif;
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--navy);
    line-height: 1;
  }

  .stat-subtext {
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-top: 8px;
  }

  .management-card {
    background: #fff;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 28px;
    margin-bottom: 24px;
  }

  .management-card h5 {
    font-family: 'Fraunces', serif;
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .btn-nav {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 24px;
    background: var(--navy);
    color: #fff;
    border-radius: 10px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 2px 12px rgba(13,31,60,0.15);
  }

  .btn-nav:hover {
    background: var(--navy-mid);
    transform: translateY(-2px);
    box-shadow: 0 5px 18px rgba(13,31,60,0.2);
    text-decoration: none;
    color: #fff;
  }

  .container-fluid {
    padding: 40px;
    background: var(--cream);
  }
</style>

<div class="container-fluid">
    <div style="margin-bottom: 32px;">
        <h1 class="page-title">
            <i class="ti ti-shield-check"></i>Admin Dashboard
        </h1>
        <p class="page-subtitle">Overview of the ScholarBridge system</p>
    </div>

    <!-- Analytics Grid -->
    <div class="admin-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-users" style="color: var(--navy);"></i></div>
            <div class="stat-label">Total Users</div>
            <div class="stat-value" id="total-users">-</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-user-graduate" style="color: var(--navy-mid);"></i></div>
            <div class="stat-label">Total Students</div>
            <div class="stat-value" id="total-students">-</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-building" style="color: var(--gold);"></i></div>
            <div class="stat-label">Total Providers</div>
            <div class="stat-value" id="total-providers">-</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-check-circle" style="color: var(--navy);"></i></div>
            <div class="stat-label">Verified Providers</div>
            <div class="stat-value" id="verified-providers">-</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-award" style="color: var(--gold);"></i></div>
            <div class="stat-label">Scholarships</div>
            <div class="stat-value" id="total-scholarships">-</div>
            <div class="stat-subtext"><span id="open-scholarships">-</span> open</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-clipboard-list" style="color: #F97316;"></i></div>
            <div class="stat-label">Applications</div>
            <div class="stat-value" id="total-applications">-</div>
            <div class="stat-subtext"><span id="pending-applications">-</span> pending</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="ti ti-thumbs-up" style="color: #10B981;"></i></div>
            <div class="stat-label">Approved</div>
            <div class="stat-value" id="approved-applications" style="color: #10B981;">-</div>
        </div>
    </div>

    <!-- Management Links -->
    <div class="management-card">
        <h5>
            <i class="ti ti-settings" style="color: var(--gold); font-size: 1.3rem;"></i>
            <span>Management</span>
        </h5>
        <a href="{{ route('admin.providers.index') }}" class="btn-nav">
            <i class="ti ti-building"></i>
            <span>Manage Providers</span>
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('{{ route("admin.analytics") }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-users').textContent = data.total_users;
                document.getElementById('total-students').textContent = data.total_students;
                document.getElementById('total-providers').textContent = data.total_providers;
                document.getElementById('verified-providers').textContent = data.verified_providers;
                document.getElementById('total-scholarships').textContent = data.total_scholarships;
                document.getElementById('open-scholarships').textContent = data.open_scholarships;
                document.getElementById('total-applications').textContent = data.total_applications;
                document.getElementById('pending-applications').textContent = data.pending_applications;
                document.getElementById('approved-applications').textContent = data.approved_applications;
            })
            .catch(error => console.error('Error loading analytics:', error));
    });
</script>
</x-app-layout>
