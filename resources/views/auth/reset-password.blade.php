<x-guest-layout>
    <div class="auth-logo">
        <i class="ti ti-key"></i>
    </div>
    <h2 class="auth-title">Reset Password</h2>
    <p class="auth-subtitle">Create your new password</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            @error('email')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" />
            @error('password')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-auth-submit">
            {{ __('Reset Password') }}
        </button>
    </form>
</x-guest-layout>
