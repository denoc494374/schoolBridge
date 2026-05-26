<section>
    <div class="mb-4">
        <h5 class="card-title" style="color: #1a1a2e; font-weight: 700;">
            <i class="ti ti-lock me-2" style="color: #534AB7;"></i>{{ __('Update Password') }}
        </h5>
        <p class="text-muted" style="font-size: 14px;">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-3 align-items-center">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-2"></i>{{ __('Save Changes') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-success" style="font-size: 13px; margin: 0;">
                    <i class="ti ti-check-circle me-1"></i>{{ __('Password updated successfully!') }}
                </p>
            @endif
        </div>
    </form>
</section>
