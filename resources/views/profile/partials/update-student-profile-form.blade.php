@if(auth()->user()->hasRole('student'))
<section>
    <div class="mb-4">
        <h5 class="card-title" style="color: #1a1a2e; font-weight: 700;">
            <i class="ti ti-school me-2" style="color: #534AB7;"></i>{{ __('Student Information') }}
        </h5>
        <p class="text-muted" style="font-size: 14px;">{{ __('Your academic profile and personal details.') }}</p>
    </div>

    @if($user->studentProfile)
        <form method="post" action="{{ route('profile.student.update') }}">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="age" class="form-label">{{ __('Age') }}</label>
                    <input id="age" name="age" type="number" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $user->studentProfile->age) }}" required min="1" max="120" />
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label for="year_level" class="form-label">{{ __('Year Level') }}</label>
                    <select id="year_level" name="year_level" class="form-control @error('year_level') is-invalid @enderror" required>
                        <option value="">-- Select Year Level --</option>
                        <option value="First Year" {{ old('year_level', $user->studentProfile->year_level) === 'First Year' ? 'selected' : '' }}>First Year</option>
                        <option value="Second Year" {{ old('year_level', $user->studentProfile->year_level) === 'Second Year' ? 'selected' : '' }}>Second Year</option>
                        <option value="Third Year" {{ old('year_level', $user->studentProfile->year_level) === 'Third Year' ? 'selected' : '' }}>Third Year</option>
                        <option value="Fourth Year" {{ old('year_level', $user->studentProfile->year_level) === 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                    </select>
                    @error('year_level')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-4">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="4" required>{{ old('address', $user->studentProfile->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-3 align-items-center">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-check me-2"></i>{{ __('Save Changes') }}
                </button>

                @if (session('status') === 'student-profile-updated')
                    <p class="text-success" style="font-size: 13px; margin: 0;">
                        <i class="ti ti-check-circle me-1"></i>{{ __('Saved successfully!') }}
                    </p>
                @endif
            </div>
        </form>
    @else
        <div class="alert alert-info" role="alert">
            <i class="ti ti-info-circle me-2"></i>{{ __('No student profile information found.') }}
        </div>
    @endif
</section>
@endif
