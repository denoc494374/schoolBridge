<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sign Up — ScholarBridge</title>
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
    justify-content: center;
    align-items: center;
    padding: 48px 40px;
    background: var(--cream);
    position: relative;
    overflow-y: auto;
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

  .role-toggle {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #fff;
    border: 0.5px solid var(--border);
    border-radius: 10px;
    padding: 4px;
    margin-bottom: 1.75rem;
    gap: 4px;
  }

  .role-btn {
    padding: 9px 12px;
    border-radius: 7px;
    border: none;
    background: transparent;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-muted);
    cursor: pointer;
    transition: background 0.18s, color 0.18s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
  }

  .role-btn svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; flex-shrink: 0; }

  .role-btn.active {
    background: var(--navy);
    color: #fff;
  }

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
    height: 44px;
    padding: 0 14px;
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

  .input-wrap input[type="email"],
  .input-wrap input[type="password"],
  .input-wrap input[type="text"],
  .input-wrap input[type="number"] {
    padding-left: 40px;
  }

  textarea {
    height: auto;
    min-height: 80px;
    padding: 12px 14px;
    resize: vertical;
    line-height: 1.5;
    font-size: 0.9rem;
    vertical-align: top;
  }

  select {
    padding-right: 14px;
  }

  input::placeholder { color: rgba(74, 90, 120, 0.45); }

  input:focus {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
  }

  select:focus,
  textarea:focus {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
  }

  input:focus + .input-icon,
  .input-wrap:focus-within .input-icon {
    stroke: var(--navy);
  }

  .input-wrap input { order: 1; }
  .input-wrap { display: flex; align-items: center; }
  .input-wrap input { flex: 1; }
  .input-wrap .input-icon { order: 2; position: absolute; }

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
    margin-bottom: 1.25rem;
  }

  .btn-submit:hover {
    background: var(--navy-mid);
    transform: translateY(-1px);
    box-shadow: 0 5px 18px rgba(13,31,60,0.24);
  }

  .btn-submit:active { transform: scale(0.99); }

  .btn-submit svg { width: 16px; height: 16px; stroke: #fff; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

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
    background: #d4edda;
    border: 0.5px solid rgba(40, 167, 69, 0.25);
    border-left: 3px solid #28a745;
    border-radius: 10px;
    padding: 16px;
    font-size: 0.9rem;
    color: #155724;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: flex-start;
    gap: 12px;
  }

  .alert-success svg { width: 20px; height: 20px; flex-shrink: 0; margin-top: 2px; }

  .alert-success-content h2 { font-size: 1rem; font-weight: 600; margin: 0 0 6px 0; }

  .alert-success-content p { margin: 0; font-size: 0.85rem; }

  .btn-dashboard {
    background: #28a745;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.2s;
    margin-top: 8px;
  }

  .btn-dashboard:hover { background: #218838; color: #fff; }

  .form-hidden {
    display: none;
  }

  #student-fields {
    display: block;
  }

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
    <h2 class="panel-heading">Join thousands<br>of <em>scholarship</em><br>seekers</h2>
    <p class="panel-sub">Create your free account today and start your journey to finding the scholarship that's right for you.</p>

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
        <div class="lbl">Always</div>
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
      <h1>Create <em>your account</em></h1>
      <p>Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
      <div class="alert-success">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
        <div class="alert-success-content">
          <h2>Account Created Successfully! </h2>
          <p>{{ session('success') }}</p>
          <a href="{{ route('login-after-register', session('register_email')) }}" class="btn-dashboard">
            Go to Dashboard →
          </a>
        </div>
      </div>
    @endif

    <!-- Role toggle -->
    <div class="role-toggle role-section {{ session('success') ? 'form-hidden' : '' }}" role="group" aria-label="Sign up as">
      <button class="role-btn active" id="btn-student" onclick="setRole('student')" type="button">
        <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        Student
      </button>
      <button class="role-btn" id="btn-provider" onclick="setRole('provider')" type="button">
        <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
        Organization
      </button>
    </div>

    <!-- Alert for errors -->
    <div class="alert-error" id="alert-error" {{ session('success') ? 'style=display:none;' : '' }}></div>

    <!-- Form -->
    <form method="POST" action="{{ route('register') }}" id="signup-form" {{ session('success') ? 'style=display:none;' : '' }}>
      @csrf
      <input type="hidden" name="role" id="role-input" value="student" />

      <!-- Name/Organization -->
      <div class="field">
        <label for="name">Name</label>
        <div class="input-wrap">
          <input type="text" id="name" name="name" placeholder="Your full name" value="{{ old('name') }}" required />
          <svg class="input-icon" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        @error('name')
          <p class="field-error show">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email -->
      <div class="field">
        <label for="email">Email address</label>
        <div class="input-wrap">
          <input type="email" id="email" name="email" placeholder="you@email.com" value="{{ old('email') }}" required />
          <svg class="input-icon" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        @error('email')
          <p class="field-error show">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div class="field">
        <label for="password">Password</label>
        <div class="input-wrap" style="position:relative;">
          <input type="password" id="password" name="password" placeholder="Create a strong password" required style="padding-right: 42px;" />
          <svg class="input-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <button class="toggle-pw" onclick="togglePw()" type="button" aria-label="Toggle password visibility" id="pw-toggle">
            <svg id="pw-icon" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        @error('password')
          <p class="field-error show">{{ $message }}</p>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="field">
        <label for="password_confirmation">Confirm password</label>
        <div class="input-wrap" style="position:relative;">
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required style="padding-right: 42px;" />
          <svg class="input-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <button class="toggle-pw" onclick="togglePwConfirm()" type="button" aria-label="Toggle password visibility" id="pw-toggle-confirm">
            <svg id="pw-icon-confirm" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        @error('password_confirmation')
          <p class="field-error show">{{ $message }}</p>
        @enderror
      </div>

      <!-- Student-only fields -->
      <div id="student-fields">
        <!-- Age -->
        <div class="field">
          <label for="age">Age</label>
          <input type="number" id="age" name="age" placeholder="18" value="{{ old('age') }}" min="1" max="120" />
          <p class="field-error" id="age-error">Please enter a valid age (1-120).</p>
        </div>

        <!-- Year Level -->
        <div class="field">
          <label for="year_level">Year Level</label>
          <select id="year_level" name="year_level" style="-webkit-appearance: none; background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2212%27 height=%278%27 viewBox=%270 0 12 8%27><path fill=%22%234A5A78%22 d=%22M1 1l5 5 5-5%22/></svg>'); background-repeat: no-repeat; background-position: right 12px center; background-size: 12px; padding-right: 32px;">
            <option value="">Select Year Level</option>
            <option value="First Year" {{ old('year_level') === 'First Year' ? 'selected' : '' }}>First Year</option>
            <option value="Second Year" {{ old('year_level') === 'Second Year' ? 'selected' : '' }}>Second Year</option>
            <option value="Third Year" {{ old('year_level') === 'Third Year' ? 'selected' : '' }}>Third Year</option>
            <option value="Fourth Year" {{ old('year_level') === 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
          </select>
          <p class="field-error" id="year_level-error">Please select a year level.</p>
        </div>

        <!-- Address -->
        <div class="field">
          <label for="address">Complete Address</label>
          <textarea id="address" name="address" placeholder="Street, City, Province">{{ old('address') }}</textarea>
          <p class="field-error" id="address-error">Please enter your complete address.</p>
        </div>
      </div>

      <button type="submit" class="btn-submit" id="submit-btn">
        <span id="btn-text">Create account</span>
        <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>

      <p class="signup-prompt">Already have an account? <a href="{{ route('login') }}">Log in instead</a></p>
    </form>

  </div>
</div>

<script>
  let pwVisible = false;
  let pwConfirmVisible = false;
  let currentRole = 'student';

  function setRole(role) {
    currentRole = role;
    document.getElementById('role-input').value = role;
    document.getElementById('btn-student').classList.toggle('active', role === 'student');
    document.getElementById('btn-provider').classList.toggle('active', role === 'provider');
    
    // Show/hide student fields
    const studentFields = document.getElementById('student-fields');
    if (role === 'student') {
      studentFields.style.display = 'block';
      // Set required attributes
      document.getElementById('age').required = true;
      document.getElementById('year_level').required = true;
      document.getElementById('address').required = true;
    } else {
      studentFields.style.display = 'none';
      // Remove required attributes
      document.getElementById('age').required = false;
      document.getElementById('year_level').required = false;
      document.getElementById('address').required = false;
    }
    
    // Update submit button text
    const btnText = document.getElementById('btn-text');
    btnText.textContent = role === 'student' ? 'Create account' : 'Create account';
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

  function togglePwConfirm() {
    pwConfirmVisible = !pwConfirmVisible;
    const input = document.getElementById('password_confirmation');
    const icon = document.getElementById('pw-icon-confirm');
    input.type = pwConfirmVisible ? 'text' : 'password';
    icon.innerHTML = pwConfirmVisible
      ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'
      : '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
  }
</script>

</body>
</html>
