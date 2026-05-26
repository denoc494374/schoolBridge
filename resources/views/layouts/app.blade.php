<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'ScholarBridge') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;1,9..144,300&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css" rel="stylesheet">
        <style>
            :root {
                --primary: #534AB7;
                --primary-dark: #3C3489;
                --dark: #1a1a2e;
                --gray-light: #f8f8fc;
                --gray-200: #e8e8f0;
                --gray-600: #666;
                --white: #fff;
            }
            body {
                background-color: var(--gray-light);
                font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                color: var(--dark);
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            .btn-primary {
                background: var(--primary);
                border: none;
                border-radius: 10px;
                padding: 10px 24px;
                font-weight: 700;
                transition: all 0.2s ease;
            }
            .btn-primary:hover {
                background: var(--primary-dark);
                transform: translateY(-2px);
                box-shadow: 0 6px 16px rgba(83, 74, 183, 0.3);
            }
            .card {
                border: 1px solid var(--gray-200);
                box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                border-radius: 16px;
                transition: all 0.3s ease;
            }
            .card:hover {
                box-shadow: 0 12px 28px rgba(83, 74, 183, 0.1);
                border-color: var(--primary);
                transform: translateY(-4px);
            }
            .page-title {
                color: var(--dark);
                font-weight: 700;
                margin-bottom: 2rem;
                font-size: 1.75rem;
                letter-spacing: -0.3px;
            }
            .form-label {
                font-weight: 600;
                color: #555;
                font-size: 14px;
                margin-bottom: 8px;
            }
            .form-control {
                border-radius: 10px;
                border: 1px solid #ddd;
                padding: 11px 14px;
                font-size: 14px;
                transition: all 0.2s ease;
            }
            .form-control:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(83, 74, 183, 0.12);
            }
            .alert {
                border: none;
                border-radius: 12px;
                font-weight: 500;
            }
            .alert-success {
                background-color: #e8f5e9;
                color: #2e7d32;
            }
            .alert-danger {
                background-color: #ffebee;
                color: #c62828;
            }
            .alert-info {
                background-color: #e3f2fd;
                color: #1565c0;
            }
        </style>
    </head>
    <body>
        <!-- Notifications -->
        <x-alert />
        
        <!-- Main Content -->
        <div class="container-fluid py-5" style="flex: 1;">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <x-footer />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
