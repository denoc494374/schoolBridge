<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>About — ScholarBridge</title>
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
    --radius: 16px;
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--text);
    line-height: 1.7;
    overflow-x: hidden;
  }

  /* ── NAV ── */
  nav {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 100;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 2.5rem;
    height: 64px;
    background: rgba(253, 250, 244, 0.88);
    backdrop-filter: blur(12px);
    border-bottom: 0.5px solid var(--border);
  }

  .logo {
    font-family: 'Fraunces', serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: var(--navy);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .logo-mark {
    width: 28px; height: 28px;
    background: var(--navy);
    border-radius: 7px;
    display: flex; align-items: center; justify-content: center;
  }

  .logo-mark svg { width: 16px; height: 16px; }

  .nav-links {
    display: flex; gap: 2rem; list-style: none;
  }

  .nav-links a {
    font-size: 0.875rem;
    color: var(--text-muted);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s;
  }

  .nav-links a:hover { color: var(--navy); }

  .nav-cta {
    background: var(--navy);
    color: #fff !important;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 0.875rem !important;
    font-weight: 500 !important;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s;
  }

  .nav-cta:hover { background: var(--navy-mid) !important; transform: translateY(-1px); }

  /* ── HERO ── */
  .hero {
    padding: 140px 2.5rem 80px;
    max-width: 960px;
    margin: 0 auto;
    position: relative;
  }

  .hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--gold-light);
    color: var(--gold-dark);
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 100px;
    margin-bottom: 1.75rem;
  }

  .hero-eyebrow span { font-size: 1em; }

  h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(2.6rem, 6vw, 4.2rem);
    font-weight: 600;
    line-height: 1.08;
    letter-spacing: -0.02em;
    color: var(--navy);
    margin-bottom: 1.5rem;
    max-width: 820px;
  }

  h1 em {
    font-style: italic;
    font-weight: 300;
    color: var(--gold);
  }

  .hero-sub {
    font-size: 1.15rem;
    color: var(--text-muted);
    max-width: 560px;
    line-height: 1.75;
    margin-bottom: 2.5rem;
  }

  .hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .btn-primary {
    background: var(--navy);
    color: #fff;
    padding: 13px 28px;
    border-radius: 10px;
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 2px 12px rgba(13,31,60,0.18);
  }

  .btn-primary:hover {
    background: var(--navy-mid);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(13,31,60,0.22);
  }

  .btn-outline {
    border: 1.5px solid var(--border);
    color: var(--navy);
    padding: 13px 28px;
    border-radius: 10px;
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: border-color 0.2s, background 0.2s, transform 0.15s;
    background: transparent;
  }

  .btn-outline:hover {
    border-color: var(--navy);
    background: var(--navy-light);
    transform: translateY(-2px);
  }

  /* ── FLOATING BADGE ── */
  .hero-badge {
    position: absolute;
    top: 148px; right: 2.5rem;
    background: var(--navy);
    color: #fff;
    border-radius: 16px;
    padding: 20px 24px;
    text-align: center;
    min-width: 148px;
    animation: float 4s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }

  .hero-badge .big { font-family: 'Fraunces', serif; font-size: 2rem; font-weight: 600; line-height: 1; }
  .hero-badge .small { font-size: 0.75rem; color: rgba(255,255,255,0.65); margin-top: 4px; }

  /* ── DIVIDER ── */
  .divider {
    max-width: 960px;
    margin: 0 auto;
    padding: 0 2.5rem;
    border: none;
    border-top: 0.5px solid var(--border);
  }

  /* ── SECTION ── */
  section {
    max-width: 960px;
    margin: 0 auto;
    padding: 80px 2.5rem;
  }

  .section-label {
    font-size: 0.78rem;
    font-weight: 500;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1rem;
  }

  h2 {
    font-family: 'Fraunces', serif;
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 600;
    line-height: 1.15;
    letter-spacing: -0.015em;
    color: var(--navy);
    margin-bottom: 1rem;
  }

  h2 em { font-style: italic; font-weight: 300; }

  .section-intro {
    font-size: 1.05rem;
    color: var(--text-muted);
    max-width: 520px;
    line-height: 1.75;
  }

  /* ── HOW IT WORKS ── */
  .how-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-top: 3rem;
  }

  .how-card {
    background: #fff;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 28px 28px 32px;
    position: relative;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .how-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(13,31,60,0.08);
  }

  .how-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
  }

  .how-card.students::before { background: var(--navy); }
  .how-card.providers::before { background: var(--gold); }
  .how-card.students { grid-column: 1 / -1; }

  .card-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 100px;
    margin-bottom: 1.25rem;
  }

  .card-tag.for-students {
    background: var(--navy-light);
    color: var(--navy);
  }

  .card-tag.for-providers {
    background: var(--gold-light);
    color: var(--gold-dark);
  }

  .how-card h3 {
    font-family: 'Fraunces', serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: var(--navy);
    margin-bottom: 0.75rem;
  }

  .how-card p {
    font-size: 0.95rem;
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 1.5rem;
  }

  .steps-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .steps-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 0.9rem;
    color: var(--text);
  }

  .step-num {
    width: 24px; height: 24px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.72rem;
    font-weight: 500;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .for-students .step-num { background: var(--navy); color: #fff; }
  .for-providers .step-num { background: var(--gold); color: #fff; }

  /* ── FEATURES ── */
  .features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 3rem;
  }

  .feat-card {
    background: #fff;
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    padding: 24px;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .feat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(13,31,60,0.08);
  }

  .feat-icon {
    width: 44px; height: 44px;
    border-radius: 11px;
    background: var(--navy-light);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 1rem;
  }

  .feat-icon svg { width: 20px; height: 20px; stroke: var(--navy); fill: none; stroke-width: 1.6; stroke-linecap: round; stroke-linejoin: round; }

  .feat-card h3 {
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--navy);
    margin-bottom: 0.5rem;
  }

  .feat-card p {
    font-size: 0.875rem;
    color: var(--text-muted);
    line-height: 1.65;
  }

  /* ── MISSION BAND ── */
  .mission-band {
    background: var(--navy);
    color: #fff;
    padding: 80px 2.5rem;
  }

  .mission-inner {
    max-width: 960px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
  }

  .mission-band .section-label { color: var(--gold); }

  .mission-band h2 { color: #fff; }

  .mission-band .section-intro { color: rgba(255,255,255,0.65); max-width: 100%; }

  .mission-stat-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  .stat-box {
    background: rgba(255,255,255,0.06);
    border: 0.5px solid rgba(255,255,255,0.12);
    border-radius: 12px;
    padding: 20px;
  }

  .stat-box .num {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 600;
    color: #fff;
    line-height: 1;
  }

  .stat-box .label {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.5);
    margin-top: 4px;
  }

  /* ── FOR WHOM ── */
  .audience-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-top: 3rem;
  }

  .audience-card {
    border: 0.5px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
  }

  .audience-head {
    padding: 24px 28px 20px;
    border-bottom: 0.5px solid var(--border);
  }

  .audience-head.navy { background: var(--navy); }
  .audience-head.gold { background: var(--gold); }

  .audience-head .icon {
    width: 40px; height: 40px;
    background: rgba(255,255,255,0.15);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 12px;
  }

  .audience-head .icon svg { width: 20px; height: 20px; stroke: #fff; fill: none; stroke-width: 1.6; stroke-linecap: round; stroke-linejoin: round; }

  .audience-head h3 {
    font-family: 'Fraunces', serif;
    font-size: 1.25rem;
    font-weight: 600;
    color: #fff;
  }

  .audience-head .sub {
    font-size: 0.85rem;
    color: rgba(255,255,255,0.65);
    margin-top: 2px;
  }

  .audience-body {
    background: #fff;
    padding: 24px 28px;
  }

  .audience-body ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .audience-body li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 0.9rem;
    color: var(--text);
  }

  .check {
    width: 18px; height: 18px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .check.navy { background: var(--navy); }
  .check.gold { background: var(--gold); }

  .check svg { width: 10px; height: 10px; stroke: #fff; fill: none; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }

  /* ── CTA ── */
  .cta-section {
    padding: 100px 2.5rem;
    max-width: 960px;
    margin: 0 auto;
    text-align: center;
  }

  .cta-section h2 { margin: 0 auto 1rem; max-width: 600px; }

  .cta-section .section-intro { margin: 0 auto 2.5rem; text-align: center; }

  .cta-actions { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }

  /* ── FOOTER ── */
  footer {
    border-top: 0.5px solid var(--border);
    padding: 32px 2.5rem;
    max-width: 960px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
  }

  footer .logo { font-size: 1rem; }

  footer p { font-size: 0.82rem; color: var(--text-muted); }

  /* ── ANIMATE ON SCROLL ── */
  .reveal { opacity: 0; transform: translateY(20px); transition: opacity 0.55s ease, transform 0.55s ease; }
  .reveal.visible { opacity: 1; transform: translateY(0); }
  .reveal-delay-1 { transition-delay: 0.1s; }
  .reveal-delay-2 { transition-delay: 0.2s; }
  .reveal-delay-3 { transition-delay: 0.3s; }
  .reveal-delay-4 { transition-delay: 0.4s; }
  .reveal-delay-5 { transition-delay: 0.5s; }

  @media (max-width: 720px) {
    .how-grid, .features-grid, .mission-inner, .audience-grid {
      grid-template-columns: 1fr;
    }
    .how-card.students { grid-column: auto; }
    .hero-badge { display: none; }
    nav .nav-links { display: none; }
    .mission-stat-grid { grid-template-columns: 1fr 1fr; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="/" class="logo">
    <div class="logo-mark">
      <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 12 Q8 4 13 12" stroke="#C8942A" stroke-width="2" stroke-linecap="round" fill="none"/>
        <circle cx="8" cy="5.5" r="2" fill="#C8942A"/>
      </svg>
    </div>
    ScholarBridge
  </a>
  <ul class="nav-links">
    <li><a href="{{ route('login') }}">Browse Scholarships</a></li>
    <li><a href="{{ route('login') }}">For Organizations</a></li>
    <li><a href="{{ route('login') }}" class="nav-cta">Get Started</a></li>
  </ul>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-eyebrow">
    Philippines' Scholarship Hub
  </div>
  <h1>Where <em>opportunities</em><br>meet ambition</h1>
  <p class="hero-sub">ScholarBridge connects Filipino students with scholarships, grants, and financial aid programs — and gives providers a trusted platform to reach the students who need them most.</p>
  <div class="hero-actions">
    <a href="{{ route('login') }}" class="btn-primary">Find a Scholarship</a>
    <a href="#how" class="btn-outline">Learn how it works</a>
  </div>

  <div class="hero-badge">
    <div class="big">Free</div>
    <div class="small">Always free<br>for students</div>
  </div>
</div>

<hr class="divider" />

<!-- HOW IT WORKS -->
<section id="how">
  <div class="section-label reveal">How it works</div>
  <h2 class="reveal reveal-delay-1">Built for <em>two sides</em><br>of the same bridge</h2>
  <p class="section-intro reveal reveal-delay-2">Whether you're a student searching for funding or an organization offering it, ScholarBridge is designed to make the process clear, fast, and fair.</p>

  <div class="how-grid">

    <div class="how-card students reveal reveal-delay-1">
      <div class="card-tag for-students">For Students</div>
      <h3>Find and apply for scholarships in minutes</h3>
      <p>Browse hundreds of scholarships from government agencies, private foundations, corporations, and NGOs — all in one place, filtered to what matches your profile.</p>
      <ul class="steps-list for-students">
        <li><span class="step-num">1</span>Create a free student profile with your academic background and interests.</li>
        <li><span class="step-num">2</span>Browse or search scholarships using filters like field of study, deadline, and award amount.</li>
        <li><span class="step-num">3</span>Read eligibility requirements and bookmark scholarships you qualify for.</li>
        <li><span class="step-num">4</span>Follow the provider's application link or submit directly through ScholarBridge.</li>
      </ul>
    </div>

    <div class="how-card providers reveal reveal-delay-2">
      <div class="card-tag for-providers">For Providers</div>
      <h3>Post your program, reach the right students</h3>
      <p>List your scholarship programs with full details and reach a growing community of qualified, motivated Filipino students actively searching for opportunities.</p>
      <ul class="steps-list for-providers">
        <li><span class="step-num">1</span>Register your organization and verify your account.</li>
        <li><span class="step-num">2</span>Post scholarship programs with eligibility criteria, amounts, and deadlines.</li>
        <li><span class="step-num">3</span>Manage applications and communicate with applicants through your dashboard.</li>
      </ul>
    </div>

    <div class="how-card providers reveal reveal-delay-3">
      <div class="card-tag for-providers">For Everyone</div>
      <h3>Transparent, up-to-date listings</h3>
      <p>Every listing is tied to a verified provider. Deadlines, requirements, and contact details are always accurate — no outdated posts, no dead links.</p>
      <ul class="steps-list for-providers">
        <li><span class="step-num">✓</span> Providers keep listings current and accurate.</li>
        <li><span class="step-num">✓</span> Students see only active, open scholarships.</li>
      </ul>
    </div>

  </div>
</section>

<hr class="divider" />

<!-- FEATURES -->
<section>
  <div class="section-label reveal">Features</div>
  <h2 class="reveal reveal-delay-1">Everything you need,<br><em>nothing you don't</em></h2>

  <div class="features-grid">

    <div class="feat-card reveal reveal-delay-1">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      </div>
      <h3>Smart Search & Filters</h3>
      <p>Filter scholarships by course, year level, location, award type, or deadline so you only see what's relevant to you.</p>
    </div>

    <div class="feat-card reveal reveal-delay-2">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
      </div>
      <h3>Deadline Reminders</h3>
      <p>Bookmark scholarships and get notified before application windows close — no more missed opportunities.</p>
    </div>

    <div class="feat-card reveal reveal-delay-3">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      </div>
      <h3>Verified Organizations</h3>
      <p>Every scholarship provider on ScholarBridge is reviewed and verified — government, corporate, or NGO.</p>
    </div>

    <div class="feat-card reveal reveal-delay-1">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      </div>
      <h3>Provider Dashboard</h3>
      <p>Organizations get a full dashboard to create, edit, and manage scholarship listings, track visibility, and respond to applicants.</p>
    </div>

    <div class="feat-card reveal reveal-delay-2">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      </div>
      <h3>Safe & Trustworthy</h3>
      <p>No pay-to-post schemes. All listings are checked for legitimacy. Students can report suspicious posts directly.</p>
    </div>

    <div class="feat-card reveal reveal-delay-3">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
      </div>
      <h3>Philippine-Focused</h3>
      <p>Built specifically for the Filipino context — from DepEd to CHED, DOST to private foundations, local and national programs.</p>
    </div>

  </div>
</section>

<!-- MISSION BAND -->
<div class="mission-band">
  <div class="mission-inner">
    <div>
      <div class="section-label">Our Mission</div>
      <h2>No student should miss a<br><em>scholarship</em> they deserve</h2>
      <p class="section-intro">Millions of scholarships go unclaimed every year — not because students don't qualify, but because they never heard about them. ScholarBridge exists to close that gap, one student at a time.</p>
    </div>
    <div>
      <div class="mission-stat-grid">
        <div class="stat-box">
          <div class="num">1,200+</div>
          <div class="label">Scholarships listed</div>
        </div>
        <div class="stat-box">
          <div class="num">300+</div>
          <div class="label">Verified providers</div>
        </div>
        <div class="stat-box">
          <div class="num">Free</div>
          <div class="label">For all students</div>
        </div>
        <div class="stat-box">
          <div class="num">PH</div>
          <div class="label">Proudly Filipino</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FOR WHOM -->
<section>
  <div class="section-label reveal">Who it's for</div>
  <h2 class="reveal reveal-delay-1">Two communities,<br><em>one platform</em></h2>
  <p class="section-intro reveal reveal-delay-2">ScholarBridge serves both sides of the scholarship journey.</p>

  <div class="audience-grid">

    <div class="audience-card reveal reveal-delay-2">
      <div class="audience-head navy">
        <div class="icon">
          <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <h3>Students</h3>
        <div class="sub">High school, college & graduate level</div>
      </div>
      <div class="audience-body">
        <ul>
          <li>
            <span class="check navy"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Browse hundreds of active scholarships in one place
          </li>
          <li>
            <span class="check navy"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Filter by course, location, year level, and deadline
          </li>
          <li>
            <span class="check navy"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Save favorites and get deadline alerts
          </li>
          <li>
            <span class="check navy"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Access full requirements, amounts, and contacts
          </li>
          <li>
            <span class="check navy"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Completely free — always
          </li>
        </ul>
      </div>
    </div>

    <div class="audience-card reveal reveal-delay-3">
      <div class="audience-head gold">
        <div class="icon">
          <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
        </div>
        <h3>Organizations & Providers</h3>
        <div class="sub">Government, corporate, NGOs & foundations</div>
      </div>
      <div class="audience-body">
        <ul>
          <li>
            <span class="check gold"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Post unlimited scholarship programs
          </li>
          <li>
            <span class="check gold"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Reach motivated, qualified Filipino students
          </li>
          <li>
            <span class="check gold"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Manage all listings from a single dashboard
          </li>
          <li>
            <span class="check gold"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Edit requirements and deadlines anytime
          </li>
          <li>
            <span class="check gold"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
            Build visibility and trust for your program
          </li>
        </ul>
      </div>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="section-label">Ready?</div>
  <h2>Start building<br><em>your future</em> today</h2>
  <p class="section-intro">Whether you're a student looking for funding or an organization ready to give back — ScholarBridge is your starting point.</p>
  <div class="cta-actions">
    <a href="{{ route('login') }}" class="btn-primary">Find Scholarships</a>
    <a href="{{ route('login') }}" class="btn-outline">Post a Scholarship</a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <a href="/" class="logo">
    <div class="logo-mark">
      <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 12 Q8 4 13 12" stroke="#C8942A" stroke-width="2" stroke-linecap="round" fill="none"/>
        <circle cx="8" cy="5.5" r="2" fill="#C8942A"/>
      </svg>
    </div>
    ScholarBridge
  </a>
  <p>© 2025 ScholarBridge. Proudly made in the Philippines</p>
</footer>

<script>
  const reveals = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => io.observe(el));
</script>
</body>
</html>