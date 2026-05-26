<section>
    <div class="mb-4">
        <h5 class="card-title" style="color: #1a1a2e; font-weight: 700;">
            <i class="ti ti-user-check me-2" style="color: #534AB7;"></i>{{ __('Profile Information') }}
        </h5>
        <p class="text-muted" style="font-size: 14px;">{{ __("Update your account's profile information and email address.") }}</p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}"></form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <div class="input-error">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-muted" style="font-size: 13px;">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" type="submit" class="auth-link" style="display: inline; padding: 0; border: none; background: none; font-size: 13px;">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success" style="font-size: 13px; margin-top: 8px;">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex gap-3 align-items-center">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-2"></i>{{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-success" style="font-size: 13px; margin: 0;">
                    <i class="ti ti-check-circle me-1"></i>{{ __('Saved successfully!') }}
                </p>
            @endif
        </div>
    </form>
</section>
