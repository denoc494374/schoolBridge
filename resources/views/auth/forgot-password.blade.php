<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forgot Password — ScholarBridge</title>
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
    --error: #C0392B;
    --error-bg: #FDECEA;
    --success: #22C55E;
    --success-bg: #F0F9FF;
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

  .right-panel {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 48px 40px;
    background: var(--cream);
    position: relative;
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
    line-height: 1.6;
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

  input[type="email"] {
    width: 100%;
    padding: 11px 14px 11px 40px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--text);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  input::placeholder { color: rgba(74, 90, 120, 0.45); }

  input:focus {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
  }

  input.error { border-color: var(--error); }

  input.error:focus { box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.1); }

  .field-error {
    font-size: 0.78rem;
    color: var(--error);
    margin-top: 5px;
    display: none;
  }

  .field-error.show { display: block; }

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
    margin: 2rem 0 1.5rem;
  }

  .btn-submit:hover {
    background: var(--navy-mid);
    transform: translateY(-1px);
    box-shadow: 0 5px 18px rgba(13,31,60,0.24);
  }

  .btn-submit:active { transform: scale(0.99); }

  .btn-submit svg { width: 16px; height: 16px; stroke: #fff; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .form-footer {
    text-align: center;
    font-size: 0.875rem;
    color: var(--text-muted);
  }

  .form-footer a {
    color: var(--navy);
    font-weight: 500;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s;
  }

  .form-footer a:hover { border-color: var(--navy); }

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
    background: var(--success-bg);
    border: 0.5px solid rgba(34, 197, 94, 0.25);
    border-left: 3px solid var(--success);
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 0.85rem;
    color: #166534;
    margin-bottom: 1.25rem;
    display: none;
  }

  .alert-success.show { display: block; }

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
    <div class="panel-eyebrow">🔐 Account Security</div>
    <h2 class="panel-heading">Reset your <em>password</em></h2>
    <p class="panel-sub">We'll send you a secure link to reset your password and regain access to your account.</p>

    <div class="panel-stats">
      <div class="p-stat">
        <div class="num">2FA</div>
        <div class="lbl">Supported</div>
      </div>
      <div class="p-stat">
        <div class="num">SSL</div>
        <div class="lbl">Encrypted</div>
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
      <h1>Forgot <em>Password?</em></h1>
      <p>No worries! Enter your email address and we'll send you a link to reset your password.</p>
    </div>

    <div class="alert-error" id="alert-error"></div>
    <div class="alert-success" id="alert-success">{{ session('status') }}</div>

    <form method="POST" action="{{ route('password.email') }}" novalidate>
      @csrf

      @if ($errors->any())
        <div class="alert-error show" id="alert-error">
          {{ $errors->first() }}
        </div>
      @endif

      @if (session('status'))
        <div class="alert-success show">
          {{ session('status') }}
        </div>
      @endif

      <!-- Email Address -->
      <div class="field">
        <label for="email">Email Address</label>
        <div class="input-wrap">
          <input type="email" id="email" name="email" placeholder="you@email.com" value="{{ old('email') }}" required />
          <svg class="input-icon" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <p class="field-error" id="email-error">Please enter a valid email address.</p>
      </div>

      <button type="submit" class="btn-submit">
        <span>Send Reset Link</span>
        <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </form>

    <div class="form-footer">
      Remember your password? <a href="{{ route('login') }}">Sign in</a>
    </div>

  </div>
</div>

<script>
  function validateEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  document.querySelector('form').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value.trim();
    const emailErr = document.getElementById('email-error');

    document.getElementById('email').classList.remove('error');
    emailErr.classList.remove('show');

    if (!validateEmail(email)) {
      document.getElementById('email').classList.add('error');
      emailErr.classList.add('show');
      e.preventDefault();
      return false;
    }
  });
</script>
</body>
</html>
