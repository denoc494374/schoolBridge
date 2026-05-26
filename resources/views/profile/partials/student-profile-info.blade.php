@if(auth()->user()->hasRole('student'))
<section>
    <div class="mb-4">
        <h5 class="card-title" style="color: #1a1a2e; font-weight: 700;">
            <i class="ti ti-school me-2" style="color: #534AB7;"></i>{{ __('Student Information') }}
        </h5>
        <p class="text-muted" style="font-size: 14px;">{{ __('Your academic profile and personal details.') }}</p>
    </div>

    @if($user->studentProfile)
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="info-group">
                    <label class="form-label" style="color: #534AB7; font-weight: 600;">{{ __('Age') }}</label>
                    <p class="form-control bg-light" style="border: none; color: #1a1a2e;">
                        {{ $user->studentProfile->age ?? 'Not provided' }}
                    </p>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="info-group">
                    <label class="form-label" style="color: #534AB7; font-weight: 600;">{{ __('Year Level') }}</label>
                    <p class="form-control bg-light" style="border: none; color: #1a1a2e;">
                        {{ $user->studentProfile->year_level ?? 'Not provided' }}
                    </p>
                </div>
            </div>

            <div class="col-12 mb-4">
                <div class="info-group">
                    <label class="form-label" style="color: #534AB7; font-weight: 600;">{{ __('Address') }}</label>
                    <p class="form-control bg-light" style="border: none; color: #1a1a2e; min-height: 60px; word-wrap: break-word;">
                        {{ $user->studentProfile->address ?? 'Not provided' }}
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info" role="alert">
            <i class="ti ti-info-circle me-2"></i>{{ __('No student profile information found.') }}
        </div>
    @endif
</section>
@endif
