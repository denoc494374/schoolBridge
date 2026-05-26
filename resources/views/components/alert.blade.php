@props(['type' => 'info', 'dismissible' => true])

<style>
    .notification-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        width: 100%;
        max-width: 500px;
        pointer-events: none;
    }

    .notification {
        margin-bottom: 12px;
        padding: 16px 20px;
        border-radius: 12px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        animation: slideIn 0.3s ease-out;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        pointer-events: all;
        font-size: 0.95rem;
        font-weight: 500;
    }

    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .notification-icon {
        flex-shrink: 0;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
    }

    .notification-content {
        flex: 1;
    }

    .notification-title {
        font-weight: 600;
        margin-bottom: 4px;
        display: block;
    }

    .notification-message {
        font-weight: 500;
        opacity: 0.9;
    }

    .notification-close {
        flex-shrink: 0;
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 0;
        margin-left: 8px;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .notification-close:hover {
        opacity: 1;
    }

    /* Success Notification */
    .notification.success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .notification.success .notification-close {
        color: rgba(255, 255, 255, 0.7);
    }

    .notification.success .notification-close:hover {
        color: white;
    }

    /* Error Notification */
    .notification.error {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    .notification.error .notification-close {
        color: rgba(255, 255, 255, 0.7);
    }

    .notification.error .notification-close:hover {
        color: white;
    }

    /* Warning Notification */
    .notification.warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
    }

    .notification.warning .notification-close {
        color: rgba(255, 255, 255, 0.7);
    }

    .notification.warning .notification-close:hover {
        color: white;
    }

    /* Info Notification */
    .notification.info {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
    }

    .notification.info .notification-close {
        color: rgba(255, 255, 255, 0.7);
    }

    .notification.info .notification-close:hover {
        color: white;
    }

    @media (max-width: 640px) {
        .notification-container {
            max-width: calc(100% - 24px);
            left: 12px;
            right: 12px;
        }
    }
</style>

@if(session('success'))
    <div class="notification-container">
        <div class="notification success" role="alert">
            <span class="notification-icon">
                <i class="ti ti-circle-check"></i>
            </span>
            <div class="notification-content">
                <span class="notification-title">Success!</span>
                <span class="notification-message">{{ session('success') }}</span>
            </div>
            @if($dismissible)
                <button type="button" class="notification-close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            @endif
        </div>
    </div>

    <script>
        setTimeout(() => {
            const notification = document.querySelector('.notification.success');
            if (notification) {
                notification.style.animation = 'slideIn 0.3s ease-out reverse';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    </script>
@endif

@if(session('error'))
    <div class="notification-container">
        <div class="notification error" role="alert">
            <span class="notification-icon">
                <i class="ti ti-circle-x"></i>
            </span>
            <div class="notification-content">
                <span class="notification-title">Error!</span>
                <span class="notification-message">{{ session('error') }}</span>
            </div>
            @if($dismissible)
                <button type="button" class="notification-close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            @endif
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="notification-container">
        <div class="notification warning" role="alert">
            <span class="notification-icon">
                <i class="ti ti-alert-circle"></i>
            </span>
            <div class="notification-content">
                <span class="notification-title">Warning!</span>
                <span class="notification-message">{{ session('warning') }}</span>
            </div>
            @if($dismissible)
                <button type="button" class="notification-close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            @endif
        </div>
    </div>
@endif

@if(session('info'))
    <div class="notification-container">
        <div class="notification info" role="alert">
            <span class="notification-icon">
                <i class="ti ti-info-circle"></i>
            </span>
            <div class="notification-content">
                <span class="notification-title">Info</span>
                <span class="notification-message">{{ session('info') }}</span>
            </div>
            @if($dismissible)
                <button type="button" class="notification-close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            @endif
        </div>
    </div>
@endif
