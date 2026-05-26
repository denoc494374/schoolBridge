<x-guest-layout>
    <div class="auth-logo">
        <i class="ti ti-shield-lock"></i>
    </div>
    <h2 class="auth-title">Confirm Password</h2>
    <p class="auth-subtitle">This is a secure area. Please confirm your password to continue</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" />
            @error('password')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-auth-submit">
            {{ __('Confirm') }}
        </button>
    </form>
</x-guest-layout>
