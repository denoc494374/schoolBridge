<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ScholarBridge') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:ital,wght@0,300;0,600;1,300;1,600&display=swap" rel="stylesheet">
        <style>
            :root {
                --gold: #C8942A;
                --gold-light: #F5E4B8;
                --navy: #0D1F3C;
                --navy-mid: #1C3560;
                --cream: #FDFAF4;
                --text: #0D1F3C;
                --text-muted: #4A5A78;
                --border: rgba(13, 31, 60, 0.12);
                --radius: 16px;
            }
            body {
                background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            }
            .auth-container {
                width: 100%;
                max-width: 450px;
                padding: 20px;
            }
            .auth-card {
                border: none;
                border-radius: 16px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.15);
                background: var(--cream);
            }
            .auth-card .card-body {
                padding: 48px 40px;
            }
            .auth-logo {
                width: 52px;
                height: 52px;
                background: rgba(200, 148, 42, 0.15);
                border-radius: 14px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 24px;
            }
            .auth-logo i {
                font-size: 26px;
                color: var(--gold);
            }
            .auth-title {
                font-family: 'Fraunces', serif;
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--navy);
                text-align: center;
                margin-bottom: 8px;
                letter-spacing: -0.3px;
            }
            .auth-subtitle {
                font-size: 13.5px;
                color: var(--text-muted);
                text-align: center;
                margin-bottom: 32px;
            }
            .form-label {
                font-weight: 600;
                color: var(--text);
                margin-bottom: 8px;
                font-size: 13px;
            }
            .form-control {
                border-radius: 10px;
                padding: 11px 14px;
                border: 0.5px solid var(--border);
                font-size: 14px;
                color: var(--text);
                transition: border-color 0.2s, box-shadow 0.2s;
            }
            .form-control:focus {
                border-color: var(--navy);
                box-shadow: 0 0 0 3px rgba(13, 31, 60, 0.08);
            }
            .form-check-input {
                border: 1px solid var(--border);
                border-radius: 6px;
                transition: all 0.2s;
            }
            .form-check-input:checked {
                background-color: var(--gold);
                border-color: var(--gold);
            }
            .form-check-label {
                font-size: 13.5px;
                color: var(--text);
                margin-bottom: 0;
            }
            .btn-auth-submit {
                background: var(--navy);
                color: var(--cream);
                border: none;
                border-radius: 10px;
                padding: 12px;
                font-size: 14px;
                font-weight: 700;
                width: 100%;
                transition: all 0.2s;
                margin-top: 8px;
            }
            .btn-auth-submit:hover {
                background: var(--gold);
                color: var(--navy);
                transform: translateY(-2px);
                box-shadow: 0 6px 16px rgba(200, 148, 42, 0.3);
            }
            .form-divider {
                border: none;
                border-top: 1px solid var(--border);
                margin: 24px 0;
            }
            .auth-footer {
                text-align: center;
                margin-top: 24px;
            }
            .auth-footer p {
                font-size: 13.5px;
                color: var(--text-muted);
                margin-bottom: 8px;
            }
            .auth-link {
                color: var(--navy);
                text-decoration: none;
                font-weight: 600;
                transition: color 0.2s;
            }
            .auth-link:hover {
                color: var(--gold);
                text-decoration: none;
            }
            .input-error {
                color: #dc3545;
                font-size: 12px;
                margin-top: 6px;
            }
        </style>
    </head>
    <body>
        <div class="auth-container">
            <div class="auth-card">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
