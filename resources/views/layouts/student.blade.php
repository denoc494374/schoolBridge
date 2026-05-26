<x-app-layout>
    <div style="display: flex; min-height: calc(100vh - 80px);">
        <!-- Left Sidebar -->
        <div style="width: 240px; background: #2563eb; color: white; padding: 20px; flex-shrink: 0;">
            <div style="margin-bottom: 30px;">
                <h3 style="margin: 0 0 20px 0; font-size: 18px; font-weight: 700;">
                    <i class="ti ti-user-graduate me-2"></i>My Scholarships
                </h3>
            </div>

            <nav style="display: flex; flex-direction: column; gap: 10px;">
                <a href="{{ route('student.scholarships.index') }}" 
                   style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; color: white; text-decoration: none; transition: all 0.3s ease; @if(request()->routeIs('student.scholarships.index')) background: rgba(255,255,255,0.2); @endif"
                   onmouseover="this.style.background='rgba(255,255,255,0.2)'"
                   onmouseout="this.style.background='@if(request()->routeIs('student.scholarships.index')) rgba(255,255,255,0.2) @else transparent @endif'">
                    <i class="ti ti-award" style="font-size: 20px;"></i>
                    <span>Available Scholarships</span>
                </a>

                <a href="{{ route('student.applications.index') }}" 
                   style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; color: white; text-decoration: none; transition: all 0.3s ease; @if(request()->routeIs('student.applications.index')) background: rgba(255,255,255,0.2); @endif"
                   onmouseover="this.style.background='rgba(255,255,255,0.2)'"
                   onmouseout="this.style.background='@if(request()->routeIs('student.applications.index')) rgba(255,255,255,0.2) @else transparent @endif'">
                    <i class="ti ti-clipboard-list" style="font-size: 20px;"></i>
                    <span>My Applications</span>
                </a>

                <a href="{{ route('student.applications.index', ['status' => 'approved']) }}" 
                   style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; color: white; text-decoration: none; transition: all 0.3s ease; @if(request('status') === 'approved') background: rgba(255,255,255,0.2); @endif"
                   onmouseover="this.style.background='rgba(255,255,255,0.2)'"
                   onmouseout="this.style.background='@if(request('status') === 'approved') rgba(255,255,255,0.2) @else transparent @endif'">
                    <i class="ti ti-check-circle" style="font-size: 20px;"></i>
                    <span>Approved</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div style="flex: 1; padding: 30px; background: #f8f8fc; overflow-y: auto;">
            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div style="font-size: 2.5rem; color: #2563eb; margin-bottom: 12px;">
                                <i class="ti ti-award"></i>
                            </div>
                            <h3 class="display-6" style="color: #2563eb;">{{ $stats['scholarships'] ?? 0 }}</h3>
                            <p class="text-muted" style="font-size: 14px; margin: 0;">Available Scholarships</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div style="font-size: 2.5rem; color: #2563eb; margin-bottom: 12px;">
                                <i class="ti ti-clipboard-list"></i>
                            </div>
                            <h3 class="display-6" style="color: #2563eb;">{{ $stats['applications'] ?? 0 }}</h3>
                            <p class="text-muted" style="font-size: 14px; margin: 0;">My Applications</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div style="font-size: 2.5rem; color: #22c55e; margin-bottom: 12px;">
                                <i class="ti ti-check-circle"></i>
                            </div>
                            <h3 class="display-6" style="color: #22c55e;">{{ $stats['approved'] ?? 0 }}</h3>
                            <p class="text-muted" style="font-size: 14px; margin: 0;">Approved</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Slot -->
            <div style="min-height: 400px;">
                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</x-app-layout>
