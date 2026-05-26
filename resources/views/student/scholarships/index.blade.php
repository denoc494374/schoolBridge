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
    
    /* Search Input Styling */
    .scholarship-search-container {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .scholarship-search-input,
    .scholarship-filter-select {
        background-color: #fff;
        border: 0.5px solid var(--border);
        border-radius: 10px;
        padding: 11px 14px;
        font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        font-size: 0.9rem;
        color: var(--text);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        outline: none;
    }
    }
    
    .scholarship-search-input::placeholder {
        color: var(--input-placeholder);
    }
    
    .scholarship-search-input:focus,
    .scholarship-filter-select:focus {
        border-color: var(--input-focus-color);
        box-shadow: 0 0 0 3px var(--input-focus-glow);
    }
    
    .scholarship-filter-select {
        cursor: pointer;
        min-width: 140px;
    }
    
    .scholarship-filter-select option {
        background-color: #f8f8fc;
        color: var(--input-text);
        padding: 8px;
    }
    
    .scholarship-row {
        transition: opacity 0.2s ease;
    }
    
    .scholarship-row.hidden {
        display: none;
    }
    
    .no-results-row {
        display: none;
    }
    
    .no-results-row.show {
        display: block;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        background: #fff;
        transition: all 0.2s ease;
    }

    .card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .card-body {
        padding: 24px;
    }

    .card-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    .page-title {
        color: var(--navy);
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 1.8rem;
    }

    .badge {
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .badge.bg-success { background: #10b981 !important; }
    .badge.bg-warning { background: #f59e0b !important; }
    .badge.bg-danger { background: #ef4444 !important; }
    .badge.bg-secondary { background: var(--text-muted) !important; }

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

    <!-- Main Content -->
    <div class="student-content">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h1 class="page-title">Available Scholarships</h1>
                        <p class="text-muted">Search scholarships by title, location, or course.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Search & Filter Bar -->
                    <div class="col-12">
                        <div class="scholarship-search-container">
                            <input 
                                type="text" 
                                id="scholarshipSearch" 
                                class="scholarship-search-input" 
                                placeholder="Search scholarships by title, location, or course..."
                                oninput="debounceSearch(this.value)">
                        </div>
                    </div>

                    <!-- Scholarships List -->
                    <div class="col-12">
                        <div class="space-y-3" id="scholarshipsContainer">
                            @forelse($scholarships as $scholarship)
                                <div class="card border-1 scholarship-row" data-title="{{ $scholarship->title }}" data-organization="{{ $scholarship->organization->name }}" data-description="{{ $scholarship->description }}" data-locations="{{ implode(' ', $scholarship->eligibility_criteria['locations'] ?? []) }}" data-courses="{{ implode(' ', $scholarship->eligibility_criteria['courses'] ?? []) }}">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h5 class="card-title mb-1">{{ $scholarship->title }}</h5>
                                                <p class="text-muted small">{{ $scholarship->organization->name }}</p>
                                            </div>
                                        </div>

                                        <p class="card-text text-muted">{{ Str::limit($scholarship->description, 160) }}</p>
                                        
                                        <div class="mb-3 small text-muted">
                                            <span class="me-3">Deadline: {{ $scholarship->deadline->format('M d, Y') }}</span>
                                            <span>Available Slots: {{ $scholarship->slots - $scholarship->applications()->where('status', 'approved')->count() }}</span>
                                        </div>

                                        <a href="{{ route('student.scholarships.show', $scholarship) }}" class="btn btn-primary btn-sm">View Details</a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            
                            <div class="card border-1 no-results-row" id="noResultsRow">
                                <div class="card-body text-muted">
                                    No scholarships match your search. Try different keywords.
                                </div>
                            </div>
                        </div>

                        @if($scholarships->hasPages())
                            <div class="mt-4">
                                {{ $scholarships->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>

    <script>
        let searchTimeout = null;

        function debounceSearch(searchTerm) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => performSearch(searchTerm), 300);
        }

        function performSearch(searchTerm) {
            const term = searchTerm.toLowerCase().trim();
            const scholarshipRows = document.querySelectorAll('.scholarship-row');
            let hasVisibleResults = false;

            scholarshipRows.forEach(row => {
                const title = row.dataset.title.toLowerCase();
                const organization = row.dataset.organization.toLowerCase();
                const description = row.dataset.description.toLowerCase();
                const locations = row.dataset.locations.toLowerCase();
                const courses = row.dataset.courses.toLowerCase();

                // If search term is empty, show all rows
                if (term === '') {
                    row.classList.remove('hidden');
                    hasVisibleResults = true;
                } else if (
                    title.includes(term) ||
                    organization.includes(term) ||
                    description.includes(term) ||
                    locations.includes(term) ||
                    courses.includes(term)
                ) {
                    row.classList.remove('hidden');
                    hasVisibleResults = true;
                } else {
                    row.classList.add('hidden');
                }
            });

            // Show/hide no results message
            const noResultsRow = document.getElementById('noResultsRow');
            if (!hasVisibleResults && term !== '') {
                noResultsRow.classList.add('show');
            } else {
                noResultsRow.classList.remove('show');
            }
        }
    </script>
</x-app-layout>
