<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Log In — ScholarBridge</title>
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

  /* subtle grid pattern */
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

  /* glow orb */
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
    justify-content: center;
    align-items: center;
    padding: 48px 40px;
    background: var(--cream);
    position: relative;
  }

  /* top-right back link */
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

  /* Form card */
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

  /* Form fields */
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
  input[type="text"] {
    width: 100%;
    height: 44px;
    padding: 0 14px 0 40px;
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

  input::placeholder { color: rgba(74, 90, 120, 0.45); }

  input:focus {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
  }

  input:focus + .input-icon,
  .input-wrap:focus-within .input-icon {
    stroke: var(--navy);
  }

  /* place icon after input for focus-within to work */
  .input-wrap input { order: 1; }
  .input-wrap { display: flex; align-items: center; }
  .input-wrap input { flex: 1; }
  .input-wrap .input-icon { order: 2; position: absolute; }

  /* password toggle */
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

  /* error state */
  input.error { border-color: var(--error); }
  input.error:focus { box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.1); }

  .field-error {
    font-size: 0.78rem;
    color: var(--error);
    margin-top: 5px;
    display: none;
  }

  .field-error.show { display: block; }

  /* row: remember + forgot */
  .form-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    margin-top: 0.25rem;
  }

  .remember {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-size: 0.85rem;
    color: var(--text-muted);
    user-select: none;
  }

  .remember input[type="checkbox"] {
    width: 16px; height: 16px;
    padding: 0;
    border-radius: 4px;
    border: 1px solid var(--border);
    accent-color: var(--navy);
    cursor: pointer;
    flex-shrink: 0;
  }

  .forgot {
    font-size: 0.85rem;
    color: var(--navy);
    font-weight: 500;
    text-decoration: none;
    transition: opacity 0.2s;
  }

  .forgot:hover { opacity: 0.7; }

  /* submit button */
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
  }

  .btn-submit:hover {
    background: var(--navy-mid);
    transform: translateY(-1px);
    box-shadow: 0 5px 18px rgba(13,31,60,0.24);
  }

  .btn-submit:active { transform: scale(0.99); }

  .btn-submit svg { width: 16px; height: 16px; stroke: #fff; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  /* responsive */
    margin-bottom: 1.75rem;
  }

  .btn-google:hover {
    background: var(--navy-light);
    border-color: rgba(13,31,60,0.22);
    transform: translateY(-1px);
  }

  .g-icon { width: 18px; height: 18px; flex-shrink: 0; }

  /* sign up link */
  .signup-prompt {
    text-align: center;
    font-size: 0.875rem;
    color: var(--text-muted);
  }

  .signup-prompt a {
    color: var(--navy);
    font-weight: 500;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s;
  }

  .signup-prompt a:hover { border-color: var(--navy); }

  /* success state */
  .success-overlay {
    display: none;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 1rem;
    padding: 2rem 0;
  }

  .success-overlay.show { display: flex; }
  .form-body.hidden { display: none; }

  .success-circle {
    width: 64px; height: 64px;
    background: var(--navy);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    animation: pop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
  }

  @keyframes pop {
    from { transform: scale(0); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
  }

  .success-circle svg { width: 28px; height: 28px; stroke: #fff; fill: none; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }

  .success-overlay h2 {
    font-family: 'Fraunces', serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--navy);
  }

  .success-overlay p { font-size: 0.9rem; color: var(--text-muted); }

  /* error alert */
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

  /* loading spinner on button */
  .spinner {
    width: 18px; height: 18px;
    border: 2px solid rgba(255,255,255,0.35);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
    display: none;
  }

  @keyframes spin { to { transform: rotate(360deg); } }

  /* responsive */
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
    <div class="panel-eyebrow">🇵🇭 Philippines' Scholarship Hub</div>
    <h2 class="panel-heading">Your next<br><em>opportunity</em><br>is waiting</h2>
    <p class="panel-sub">Thousands of Filipino students have found their scholarship through ScholarBridge. Log in and continue your journey.</p>

    <div class="panel-stats">
      <div class="p-stat">
        <div class="num">1,200+</div>
        <div class="lbl">Scholarships</div>
      </div>
      <div class="p-stat">
        <div class="num">300+</div>
        <div class="lbl">Providers</div>
      </div>
      <div class="p-stat">
        <div class="num">Free</div>
        <div class="lbl">For students</div>
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
      <h1>Welcome <em>back</em></h1>
      <p>Don't have an account? <a href="{{ route('register') }}">Sign up free</a></p>
    </div>

    <!-- Error alert -->
    <div class="alert-error" id="alert-error">Incorrect email or password. Please try again.</div>

    <!-- Form body -->
    <div class="form-body" id="form-body">
      <form id="login-form" method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        @if ($errors->any())
          <div class="alert-error show" id="alert-error">
            @if ($errors->has('email') || $errors->has('password'))
              Incorrect email or password. Please try again.
            @else
              {{ $errors->first() }}
            @endif
          </div>
        @else
          <div class="alert-error" id="alert-error">Incorrect email or password. Please try again.</div>
        @endif

        <div class="field">
          <label for="email">Email address</label>
          <div class="input-wrap">
            <input type="email" id="email" name="email" placeholder="you@email.com" autocomplete="email" value="{{ old('email') }}" required />
            <svg class="input-icon" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <p class="field-error" id="email-error">Please enter a valid email address.</p>
        </div>

        <div class="field">
          <label for="password">Password</label>
          <div class="input-wrap" style="position:relative;">
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" style="padding-right: 42px;" required />
            <svg class="input-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <button class="toggle-pw" onclick="togglePw()" type="button" aria-label="Toggle password visibility" id="pw-toggle">
              <svg id="pw-icon" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
          <p class="field-error" id="pw-error">Password must be at least 8 characters.</p>
        </div>

        <div class="form-row">
          <label class="remember" for="remember">
            <input type="checkbox" id="remember" name="remember" />
            Keep me logged in
          </label>
          <a href="{{ route('password.request') }}" class="forgot">Forgot password?</a>
        </div>

        <button type="submit" class="btn-submit" id="submit-btn">
          <span id="btn-text">Log in</span>
          <div class="spinner" id="spinner"></div>
          <svg id="btn-arrow" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </form>

      <p class="signup-prompt">New to ScholarBridge? <a href="{{ route('register') }}">Create a free account</a></p>
    </div>

    <!-- Success state -->
    <div class="success-overlay" id="success-overlay">
      <div class="success-circle">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <h2>You're in!</h2>
      <p>Redirecting you to your dashboard…</p>
    </div>

  </div>
</div>

<script>
  let pwVisible = false;
  let currentRole = 'student';

  function setRole(role) {
    currentRole = role;
    document.getElementById('btn-student').classList.toggle('active', role === 'student');
    document.getElementById('btn-provider').classList.toggle('active', role === 'provider');
  }

  function togglePw() {
    pwVisible = !pwVisible;
    const input = document.getElementById('password');
    const icon = document.getElementById('pw-icon');
    input.type = pwVisible ? 'text' : 'password';
    icon.innerHTML = pwVisible
      ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'
      : '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
  }

  function validateEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  document.getElementById('login-form').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value.trim();
    const pw = document.getElementById('password').value;
    const emailErr = document.getElementById('email-error');
    const pwErr = document.getElementById('pw-error');
    const alert = document.getElementById('alert-error');

    let valid = true;

    // reset
    document.getElementById('email').classList.remove('error');
    document.getElementById('password').classList.remove('error');
    emailErr.classList.remove('show');
    pwErr.classList.remove('show');
    alert.classList.remove('show');

    if (!validateEmail(email)) {
      document.getElementById('email').classList.add('error');
      emailErr.classList.add('show');
      valid = false;
    }

    if (pw.length < 8) {
      document.getElementById('password').classList.add('error');
      pwErr.classList.add('show');
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
      return;
    }

    // Show loading state
    const btn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const spinner = document.getElementById('spinner');
    const arrow = document.getElementById('btn-arrow');

    btn.disabled = true;
    btnText.textContent = 'Logging in…';
    spinner.style.display = 'block';
    arrow.style.display = 'none';

    // Form will submit normally and redirect on success
  });

  // allow Enter key
  document.addEventListener('keydown', e => {
    if (e.key === 'Enter' && document.getElementById('login-form')) {
      document.getElementById('login-form').dispatchEvent(new Event('submit'));
    }
  });
</script>
</body>
</html>