<style>
    :root {
        --gold: #C8942A;
        --navy: #0D1F3C;
        --cream: #FDFAF4;
        --text-muted: #4A5A78;
        --border: rgba(13, 31, 60, 0.12);
    }

    .scholarbridge-footer-wrapper {
        width: 100%;
        border-top: 0.5px solid var(--border);
        background: var(--cream);
        display: flex;
        justify-content: center;
        padding: 32px 1rem;
    }

    .scholarbridge-footer {
        max-width: 960px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .scholarbridge-footer .logo {
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: inherit;
        font-weight: 600;
        color: var(--navy);
        transition: opacity 0.2s ease;
    }

    .scholarbridge-footer .logo:hover {
        opacity: 0.7;
    }

    .scholarbridge-footer .logo-mark {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .scholarbridge-footer .logo-mark svg {
        width: 100%;
        height: 100%;
    }

    .scholarbridge-footer p {
        font-size: 0.82rem;
        color: var(--text-muted);
        margin: 0;
    }

    @media (max-width: 640px) {
        .scholarbridge-footer {
            flex-direction: column;
            text-align: center;
        }

        .scholarbridge-footer .logo {
            justify-content: center;
        }
    }
</style>

<div class="scholarbridge-footer-wrapper">
    <footer class="scholarbridge-footer">
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
</div>
