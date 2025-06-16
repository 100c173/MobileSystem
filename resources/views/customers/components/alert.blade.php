{{-- Global Alert Container --}}

<div class="global-alerts">
    {{-- Success Alert --}}
    @if (session('success'))
    <div class="global-alert success animate__animated animate__fadeInDown" data-auto-dismiss="5000">
        <div class="alert-content">
            <div class="alert-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="alert-body">
                <h5 class="alert-title">Done successfully</h5>
                <p class="alert-message">{{ session('success') }}</p>
            </div>
            <button class="alert-close" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="alert-progress"></div>
    </div>
    @endif

    {{-- Error Alert --}}
    @if (session('error'))
    <div class="global-alert error animate__animated animate__fadeInDown" data-auto-dismiss="5000">
        <div class="alert-content">
            <div class="alert-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div class="alert-body">
                <h5 class="alert-title">Error</h5>
                <p class="alert-message">{{ session('error') }}</p>
            </div>
            <button class="alert-close" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="alert-progress"></div>
    </div>
    @endif

    {{-- Warning Alert --}}
    @if ($errors->any())
    <div class="global-alert warning animate__animated animate__fadeInDown" data-auto-dismiss="8000">
        <div class="alert-content">
            <div class="alert-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            </div>
            <div class="alert-body">
                <h5 class="alert-title">Warring</h5>
                <ul class="alert-message">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button class="alert-close" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="alert-progress"></div>
    </div>
    @endif
</div>

<style>
.global-alerts {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    width: 100%;
    max-width: 400px;
    pointer-events: none;
}

.global-alert {
    position: relative;
    margin-bottom: 15px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    pointer-events: auto;
    transform: translateX(0);
    transition: all 0.3s ease;
}

.global-alert.hide {
    transform: translateX(150%);
    opacity: 0;
}

.alert-content {
    display: flex;
    align-items: flex-start;
    padding: 16px;
    position: relative;
    z-index: 2;
}

.alert-icon {
    margin-right: 12px;
    flex-shrink: 0;
}

.alert-icon svg {
    width: 24px;
    height: 24px;
}

.alert-body {
    flex-grow: 1;
}

.alert-title {
    margin: 0 0 4px 0;
    font-size: 16px;
    font-weight: 600;
}

.alert-message {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

.alert-message ul {
    margin: 0;
    padding-left: 20px;
}

.alert-close {
    background: none;
    border: none;
    padding: 0;
    margin-left: 12px;
    cursor: pointer;
    opacity: 0.7;
    transition: opacity 0.2s;
    color: inherit;
}

.alert-close:hover {
    opacity: 1;
}

.alert-close svg {
    width: 20px;
    height: 20px;
}

.alert-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 4px;
    width: 100%;
    background: rgba(255, 255, 255, 0.3);
    z-index: 1;
}

.alert-progress::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 100%;
    width: 100%;
    transform-origin: left;
    animation: progress linear forwards;
}

/* Alert Types */
.global-alert.success {
    background: #f6ffed;
    border: 1px solid #b7eb8f;
    color: #52c41a;
}

.global-alert.success .alert-progress::after {
    background: #52c41a;
    animation-duration: 5s;
}

.global-alert.error {
    background: #fff2f0;
    border: 1px solid #ffccc7;
    color: #ff4d4f;
}

.global-alert.error .alert-progress::after {
    background: #ff4d4f;
    animation-duration: 5s;
}

.global-alert.warning {
    background: #fffbe6;
    border: 1px solid #ffe58f;
    color: #faad14;
}

.global-alert.warning .alert-progress::after {
    background: #faad14;
    animation-duration: 8s;
}

@keyframes progress {
    from {
        transform: scaleX(1);
    }
    to {
        transform: scaleX(0);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto dismiss alerts
    document.querySelectorAll('.global-alert[data-auto-dismiss]').forEach(alert => {
        const timeout = parseInt(alert.getAttribute('data-auto-dismiss'));
        
        setTimeout(() => {
            alert.classList.add('hide');
            setTimeout(() => alert.remove(), 300);
        }, timeout);
    });

    // Close button functionality
    document.querySelectorAll('.alert-close').forEach(button => {
        button.addEventListener('click', function() {
            const alert = this.closest('.global-alert');
            alert.classList.add('hide');
            setTimeout(() => alert.remove(), 300);
        });
    });
});
</script>