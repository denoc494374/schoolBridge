<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Verify Email — ScholarBridge</title>
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
    text-align: center;
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
    margin-bottom: 1rem;
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

  .icon-circle {
    width: 72px;
    height: 72px;
    background: var(--navy-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    animation: pulse 2s ease-in-out infinite;
  }

  @keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
  }

  .icon-circle svg { width: 36px; height: 36px; stroke: var(--navy); fill: none; stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round; }

  .alert-success {
    background: var(--success-bg);
    border: 0.5px solid rgba(34, 197, 94, 0.25);
    border-left: 3px solid var(--success);
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 0.85rem;
    color: #166534;
    margin-bottom: 1.75rem;
    display: block;
  }

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

  .form-footer {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    font-size: 0.875rem;
    color: var(--text-muted);
  }

  .form-footer button,
  .form-footer a {
    background: none;
    border: none;
    padding: 0;
    font-family: inherit;
    font-size: inherit;
    color: var(--navy);
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s;
  }

  .form-footer button:hover,
  .form-footer a:hover { border-color: var(--navy); }

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
    <div class="panel-eyebrow">Email <em>Verification</em></div>
    <h2 class="panel-heading">Verify your <em>email</em></h2>
    <p class="panel-sub">We've sent you an email with a verification link. Click the link to confirm your email address and complete your registration.</p>

    <div class="panel-stats">
      <div class="p-stat">
        <div class="num">Instant</div>
        <div class="lbl">Verification</div>
      </div>
      <div class="p-stat">
        <div class="num">Secure</div>
        <div class="lbl">Process</div>
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

    <div class="icon-circle">
      <svg viewBox="0 0 24 24"><path d="M21.5 2H2.5A1.5 1.5 0 0 0 1 3.5v17A1.5 1.5 0 0 0 2.5 22h19A1.5 1.5 0 0 0 23 20.5v-17A1.5 1.5 0 0 0 21.5 2z"/><path d="M23 3L12 13 1 3"/></svg>
    </div>

    <div class="form-top">
      <h1>Verify Your <em>Email</em></h1>
      <p>We've sent a verification link to your email address. Please check your inbox and click the link to complete your registration.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
      <div class="alert-success">
        A new verification link has been sent to your email address.
      </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="btn-submit">
        <span>Resend Verification Email</span>
        <svg viewBox="0 0 24 24"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"/></svg>
      </button>
    </form>

    <div class="form-footer">
      <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit">Log Out</button>
      </form>
      <span>or</span>
      <a href="{{ route('login') }}">Sign in with different email</a>
    </div>

  </div>
</div>

</body>
</html>
