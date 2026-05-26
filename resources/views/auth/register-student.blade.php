<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Create Student Account — ScholarBridge</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;1,9..144,300&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet" />
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
    --border-focus: #0D1F3C;
    --input-bg: #fff;
    --radius: 16px;
    --error: #C0392B;
    --error-bg: #FDECEA;
  }

  html, body {
    height: 100%;
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--text);
    line-height: 1.6;
  }

  body {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 100vh;
  }

  /* ── LEFT PANEL ── */
  .left-panel {
    background: var(--navy);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 40px 48px 48px;
    position: relative;
    overflow: hidden;
  }

  .left-panel::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
  }

  .left-panel::after {
    content: '';
    position: absolute;
    bottom: -120px;
    left: -80px;
    width: 420px;
    height: 420px;
    background: radial-gradient(circle, rgba(200,148,42,0.18) 0%, transparent 70%);
    pointer-events: none;
  }

  .panel-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    position: relative;
    z-index: 1;
  }

  .logo-mark {
    width: 32px; height: 32px;
    background: rgba(255,255,255,0.08);
    border: 0.5px solid rgba(255,255,255,0.15);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .logo-mark svg { width: 18px; height: 18px; }

  .panel-logo span {
    font-family: 'Fraunces', serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #fff;
  }

  .panel-content {
    position: relative;
    z-index: 1;
  }

  .panel-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(200,148,42,0.18);
    color: var(--gold);
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 100px;
    margin-bottom: 1.5rem;
    border: 0.5px solid rgba(200,148,42,0.3);
  }

  .panel-heading {
    font-family: 'Fraunces', serif;
    font-size: clamp(1.9rem, 3.5vw, 2.6rem);
    font-weight: 600;
    line-height: 1.1;
    letter-spacing: -0.02em;
    color: #fff;
    margin-bottom: 1.25rem;
  }

  .panel-heading em {
    font-style: italic;
    font-weight: 300;
    color: var(--gold);
  }

  .panel-sub {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.55);
    line-height: 1.75;
    max-width: 340px;
    margin-bottom: 2.5rem;
  }

  .panel-stats {
    display: flex;
    gap: 24px;
  }

  .p-stat {
    background: rgba(255,255,255,0.05);
    border: 0.5px solid rgba(255,255,255,0.1);
    border-radius: 12px;
    padding: 16px 20px;
    min-width: 110px;
  }

  .p-stat .num {
    font-family: 'Fraunces', serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
    line-height: 1;
  }

  .p-stat .lbl {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.45);
    margin-top: 3px;
  }

  .panel-footer {
    position: relative;
    z-index: 1;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.3);
  }

  /* ── RIGHT PANEL ── */
  .right-panel {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 48px 40px;
    background: var(--cream);
    position: relative;
    overflow-y: auto;
    min-height: 100vh;
  }

  .back-link {
    position: absolute;
    top: 32px; right: 32px;
    font-size: 0.85rem;
    color: var(--text-muted);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
    transition: color 0.2s;
  }

  .back-link:hover { color: var(--navy); }

  .back-link svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .form-card {
    width: 100%;
    max-width: 420px;
    animation: fadeUp 0.5s ease both;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .form-top {
    margin-bottom: 2.25rem;
  }

  .form-top h1 {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 600;
    color: var(--navy);
    letter-spacing: -0.02em;
    line-height: 1.1;
    margin-bottom: 0.5rem;
  }

  .form-top h1 em {
    font-style: italic;
    font-weight: 300;
    color: var(--gold);
  }

  .form-top p {
    font-size: 0.9rem;
    color: var(--text-muted);
  }

  .form-top p a {
    color: var(--navy);
    font-weight: 500;
    text-decoration: none;
    border-bottom: 1px solid var(--border);
    transition: border-color 0.2s;
  }

  .form-top p a:hover { border-color: var(--navy); }

  .field {
    margin-bottom: 1.1rem;
  }

  label {
    display: block;
    font-size: 0.82rem;
    font-weight: 500;
    color: var(--text);
    margin-bottom: 6px;
    letter-spacing: 0.01em;
  }

  .input-wrap {
    position: relative;
  }

  .input-icon {
    position: absolute;
    left: 13px; top: 50%;
    transform: translateY(-50%);
    width: 16px; height: 16px;
    stroke: var(--text-muted);
    fill: none;
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
    pointer-events: none;
    transition: stroke 0.2s;
  }

  input[type="email"],
  input[type="password"],
  input[type="text"],
  input[type="number"],
  select,
  textarea {
    width: 100%;
    padding: 11px 14px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--text);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    -webkit-appearance: none;
  }

  input[type="number"] { padding-left: 14px; }
  select { padding-right: 14px; }
  textarea { resize: vertical; min-height: 60px; }

  input::placeholder { color: rgba(74, 90, 120, 0.45); }

  input:focus,
  select:focus,
  textarea:focus {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
  }

  input.error,
  select.error { border-color: var(--error); }

  input.error:focus,
  select.error:focus { box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.1); }

  .field-error {
    font-size: 0.78rem;
    color: var(--error);
    margin-top: 5px;
    display: none;
  }

  .field-error.show { display: block; }

  .toggle-pw {
    position: absolute;
    right: 13px; top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 2px;
    color: var(--text-muted);
    display: flex; align-items: center;
    transition: color 0.2s;
  }

  .toggle-pw:hover { color: var(--navy); }
  .toggle-pw svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }

  .btn-submit {
    width: 100%;
    height: 48px;
    background: var(--navy);
    color: #fff;
    border: none;
    border-radius: 11px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 2px 12px rgba(13,31,60,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    letter-spacing: 0.01em;
    margin-bottom: 1.25rem;
    margin-top: 1.5rem;
  }

  .btn-submit:hover {
    background: var(--navy-mid);
    transform: translateY(-1px);
    box-shadow: 0 5px 18px rgba(13,31,60,0.24);
  }

  .btn-submit:active { transform: scale(0.99); }

  .btn-submit svg { width: 16px; height: 16px; stroke: #fff; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .login-prompt {
    text-align: center;
    font-size: 0.875rem;
    color: var(--text-muted);
  }

  .login-prompt a {
    color: var(--navy);
    font-weight: 500;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s;
  }

  .login-prompt a:hover { border-color: var(--navy); }

  .alert-error {
    background: var(--error-bg);
    border: 0.5px solid rgba(192,57,43,0.25);
    border-left: 3px solid var(--error);
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 0.85rem;
    color: var(--error);
    margin-bottom: 1.25rem;
    display: none;
  }

  .alert-error.show { display: block; }

  .alert-success {
    background: #F0F9FF;
    border: 0.5px solid rgba(34, 197, 94, 0.25);
    border-left: 3px solid #22C55E;
    border-radius: 10px;
    padding: 16px;
    margin-bottom: 1.5rem;
    display: flex;
    gap: 12px;
  }

  .alert-success svg { width: 20px; height: 20px; stroke: #22C55E; flex-shrink: 0; margin-top: 2px; }

  .alert-success-content h2 { font-size: 0.95rem; color: #166534; margin-bottom: 4px; }
  .alert-success-content p { font-size: 0.85rem; color: #15803d; line-height: 1.5; }

  .auth-footer {
    margin-top: 2rem;
    text-align: center;
    font-size: 0.85rem;
    color: var(--text-muted);
    border-top: 1px solid var(--border);
    padding-top: 1.5rem;
  }

  .auth-footer a {
    color: var(--navy);
    font-weight: 500;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s;
  }

  .auth-footer a:hover { border-color: var(--navy); }

  @media (max-width: 768px) {
    body { grid-template-columns: 1fr; }
    .left-panel { display: none; }
    .right-panel { padding: 40px 24px; }
    .back-link { top: 20px; right: 20px; }
  }
</style>
</head>
<body>

<!-- LEFT PANEL -->
<div class="left-panel">
  <a href="/" class="panel-logo">
    <div class="logo-mark">
      <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 14 Q9 4 15 14" stroke="#C8942A" stroke-width="2" stroke-linecap="round" fill="none"/>
        <circle cx="9" cy="6.5" r="2.5" fill="#C8942A"/>
      </svg>
    </div>
    <span>ScholarBridge</span>
  </a>

  <div class="panel-content">
    <div class="panel-eyebrow">Students First</div>
    <h2 class="panel-heading">Your scholarship <em>journey</em><br>starts here</h2>
    <p class="panel-sub">Create your student account and unlock access to 1,200+ scholarships from top Filipino organizations and institutions.</p>

    <div class="panel-stats">
      <div class="p-stat">
        <div class="num">1,200+</div>
        <div class="lbl">Scholarships</div>
      </div>
      <div class="p-stat">
        <div class="num">Free</div>
        <div class="lbl">Forever</div>
      </div>
    </div>
  </div>

  <p class="panel-footer">© 2025 ScholarBridge. Proudly made in the Philippines.</p>
</div>

<!-- RIGHT PANEL -->
<div class="right-panel">
  <a href="/" class="back-link">
    <svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Back to home
  </a>

  <div class="form-card">

    <div class="form-top">
      <h1>Register as <em>Student</em></h1>
      <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
    </div>

    <!-- Error alert -->
    <div class="alert-error" id="alert-error"></div>

    <!-- Success message -->
    @if(session('success'))
      <div class="alert-success">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <div class="alert-success-content">
          <h2>Account Created Successfully!</h2>
          <p>{{ session('success') }}</p>
        </div>
      </div>
    @endif

    <!-- Form body -->
    <form id="register-form" method="POST" action="{{ route('student.register') }}" novalidate {{ session('success') ? 'style=display:none;' : '' }}>
      @csrf

      @if ($errors->any())
        <div class="alert-error show" id="alert-error">
          {{ $errors->first() }}
        </div>
      @endif

      <!-- Full Name -->
      <div class="field">
        <label for="full_name">Full Name</label>
        <div class="input-wrap">
          <input type="text" id="full_name" name="full_name" placeholder="Juan Dela Cruz" value="{{ old('full_name') }}" required />
          <svg class="input-icon" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <p class="field-error" id="full_name-error">Please enter your full name.</p>
      </div>

      <!-- Age -->
      <div class="field">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" placeholder="18" value="{{ old('age') }}" min="1" max="120" required />
        <p class="field-error" id="age-error">Please enter a valid age (1-120).</p>
      </div>

      <!-- Year Level -->
      <div class="field">
        <label for="year_level">Year Level</label>
        <select id="year_level" name="year_level" required>
          <option value="">Select Year Level</option>
          <option value="First Year" {{ old('year_level') === 'First Year' ? 'selected' : '' }}>First Year</option>
          <option value="Second Year" {{ old('year_level') === 'Second Year' ? 'selected' : '' }}>Second Year</option>
          <option value="Third Year" {{ old('year_level') === 'Third Year' ? 'selected' : '' }}>Third Year</option>
          <option value="Fourth Year" {{ old('year_level') === 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
        </select>
        <p class="field-error" id="year_level-error">Please select a year level.</p>
      </div>

      <!-- Complete Address -->
      <div class="field">
        <label for="address">Complete Address</label>
        <textarea id="address" name="address" placeholder="Street, City, Province" required>{{ old('address') }}</textarea>
        <p class="field-error" id="address-error">Please enter your complete address.</p>
      </div>

      <!-- Email Address -->
      <div class="field">
        <label for="email">Email Address</label>
        <div class="input-wrap">
          <input type="email" id="email" name="email" placeholder="you@email.com" value="{{ old('email') }}" required />
          <svg class="input-icon" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <p class="field-error" id="email-error">Please enter a valid email address.</p>
      </div>

      <!-- Password -->
      <div class="field">
        <label for="password">Password</label>
        <div class="input-wrap" style="position:relative;">
          <input type="password" id="password" name="password" placeholder="Min. 8 characters" style="padding-right: 42px;" required />
          <svg class="input-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <button class="toggle-pw" onclick="togglePw('password', 'pw-icon'); return false;" type="button" aria-label="Toggle password visibility" id="pw-toggle">
            <svg id="pw-icon" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <p class="field-error" id="password-error">Password must be at least 8 characters.</p>
      </div>

      <!-- Confirm Password -->
      <div class="field">
        <label for="password_confirmation">Confirm Password</label>
        <div class="input-wrap" style="position:relative;">
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" style="padding-right: 42px;" required />
          <svg class="input-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <button class="toggle-pw" onclick="togglePw('password_confirmation', 'pw-confirm-icon'); return false;" type="button" aria-label="Toggle password visibility">
            <svg id="pw-confirm-icon" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <p class="field-error" id="password_confirmation-error">Passwords do not match.</p>
      </div>

      <button type="submit" class="btn-submit" id="submit-btn">
        <span id="btn-text">Create Account</span>
        <svg id="btn-arrow" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </form>

    <p class="login-prompt">Already have an account? <a href="{{ route('login') }}">Log in to your account</a></p>

  </div>

  <div class="auth-footer">
    <p>{{ __('Already have an account?') }}</p>
    <a href="{{ route('login') }}" class="auth-link">{{ __('Sign in here') }}</a>
  </div>
</div>

<script>
  let pwVisible = {};

  function togglePw(fieldId, iconId) {
    pwVisible[fieldId] = !pwVisible[fieldId];
    const input = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);
    input.type = pwVisible[fieldId] ? 'text' : 'password';
    icon.innerHTML = pwVisible[fieldId]
      ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'
      : '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
  }

  function validateEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  document.getElementById('register-form').addEventListener('submit', function(e) {
    const fullName = document.getElementById('full_name').value.trim();
    const age = parseInt(document.getElementById('age').value);
    const gradeLevel = document.getElementById('grade_level').value;
    const address = document.getElementById('address').value.trim();
    const email = document.getElementById('email').value.trim();
    const pw = document.getElementById('password').value;
    const pwConfirm = document.getElementById('password_confirmation').value;

    let valid = true;

    // reset errors
    document.querySelectorAll('.field-error').forEach(el => el.classList.remove('show'));
    document.querySelectorAll('input, select, textarea').forEach(el => el.classList.remove('error'));

    if (!fullName) {
      document.getElementById('full_name').classList.add('error');
      document.getElementById('full_name-error').classList.add('show');
      valid = false;
    }

    if (age < 1 || age > 120 || !age) {
      document.getElementById('age').classList.add('error');
      document.getElementById('age-error').classList.add('show');
      valid = false;
    }

    if (!gradeLevel) {
      document.getElementById('grade_level').classList.add('error');
      document.getElementById('grade_level-error').classList.add('show');
      valid = false;
    }

    if (!address) {
      document.getElementById('address').classList.add('error');
      document.getElementById('address-error').classList.add('show');
      valid = false;
    }

    if (!validateEmail(email)) {
      document.getElementById('email').classList.add('error');
      document.getElementById('email-error').classList.add('show');
      valid = false;
    }

    if (pw.length < 8) {
      document.getElementById('password').classList.add('error');
      document.getElementById('password-error').classList.add('show');
      valid = false;
    }

    if (pw !== pwConfirm) {
      document.getElementById('password_confirmation').classList.add('error');
      document.getElementById('password_confirmation-error').classList.add('show');
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
      return;
    }
  });
</script>
</body>
</html>
