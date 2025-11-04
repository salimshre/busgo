// SeatGo Bus Reservation System JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Form validation
    initFormValidation();
    
    // Auto-hide flash messages
    initFlashMessages();
    
    // Task filters
    initTaskFilters();
    
    // Confirmation dialogs
    initConfirmationDialogs();
    
    // Progress bar animation
    initProgressBarAnimation();
});

// Form validation
function initFormValidation() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#dc3545';
                    field.addEventListener('input', function() {
                        this.style.borderColor = '';
                    }, { once: true });
                }
            });
            
            // Password confirmation validation
            const password = form.querySelector('input[name="password"]');
            const confirmPassword = form.querySelector('input[name="confirm_password"]');
            
            if (password && confirmPassword) {
                if (password.value !== confirmPassword.value) {
                    isValid = false;
                    confirmPassword.style.borderColor = '#dc3545';
                    showError('Passwords do not match');
                }
            }
            
            // Email validation
            const emailFields = form.querySelectorAll('input[type="email"]');
            emailFields.forEach(email => {
                if (email.value && !isValidEmail(email.value)) {
                    isValid = false;
                    email.style.borderColor = '#dc3545';
                    showError('Please enter a valid email address');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
}

// Auto-hide flash messages
function initFlashMessages() {
    const alerts = document.querySelectorAll('.alert');
    
    alerts.forEach(alert => {
        // Add close button
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '×';
        closeBtn.style.cssText = `
            float: right;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            margin-left: 1rem;
            opacity: 0.7;
        `;
        closeBtn.addEventListener('click', () => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        });
        alert.appendChild(closeBtn);
        
        // Auto-hide success messages after 5 seconds
        if (alert.classList.contains('alert-success')) {
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }
            }, 5000);
        }
    });
}

// Task filters
function initTaskFilters() {
    const filterForm = document.querySelector('.filters-form');
    if (!filterForm) return;
    
    const statusSelect = filterForm.querySelector('select[name="status"]');
    const searchInput = filterForm.querySelector('input[name="search"]');
    
    // Auto-submit on status change
    if (statusSelect) {
        statusSelect.addEventListener('change', () => {
            filterForm.submit();
        });
    }
    
    // Debounced search
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                filterForm.submit();
            }, 500);
        });
    }
}

// Confirmation dialogs
function initConfirmationDialogs() {
    const deleteButtons = document.querySelectorAll('button[onclick*="confirm"]');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const confirmMessage = this.getAttribute('onclick').match(/confirm\('([^']+)'\)/);
            if (confirmMessage) {
                e.preventDefault();
                showConfirmDialog(confirmMessage[1], () => {
                    this.closest('form').submit();
                });
            }
        });
        
        // Remove the onclick attribute to prevent double confirmation
        button.removeAttribute('onclick');
    });
}

// Progress bar animation
function initProgressBarAnimation() {
    const progressBars = document.querySelectorAll('.progress-fill');
    
    progressBars.forEach(bar => {
        const targetWidth = bar.style.width;
        bar.style.width = '0%';
        
        setTimeout(() => {
            bar.style.width = targetWidth;
        }, 500);
    });
}

// Utility functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showError(message) {
    // Create or update error alert
    let errorAlert = document.querySelector('.alert-error.js-error');
    
    if (!errorAlert) {
        errorAlert = document.createElement('div');
        errorAlert.className = 'alert alert-error js-error';
        errorAlert.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            max-width: 400px;
            animation: slideIn 0.3s ease;
        `;
        document.body.appendChild(errorAlert);
    }
    
    errorAlert.innerHTML = message;
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        if (errorAlert.parentNode) {
            errorAlert.style.opacity = '0';
            setTimeout(() => errorAlert.remove(), 300);
        }
    }, 5000);
}

function showConfirmDialog(message, onConfirm) {
    // Create modal overlay
    const overlay = document.createElement('div');
    overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    `;
    
    // Create modal content
    const modal = document.createElement('div');
    modal.style.cssText = `
        background: white;
        padding: 2rem;
        border-radius: 8px;
        max-width: 400px;
        margin: 0 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    `;
    
    modal.innerHTML = `
        <h3 style="margin: 0 0 1rem 0; color: #343a40;">Confirm Action</h3>
        <p style="margin: 0 0 2rem 0; color: #6c757d;">${message}</p>
        <div style="display: flex; gap: 1rem; justify-content: center;">
            <button class="btn btn-danger confirm-yes">Yes, Delete</button>
            <button class="btn btn-outline confirm-no">Cancel</button>
        </div>
    `;
    
    overlay.appendChild(modal);
    document.body.appendChild(overlay);
    
    // Handle button clicks
    modal.querySelector('.confirm-yes').addEventListener('click', () => {
        document.body.removeChild(overlay);
        onConfirm();
    });
    
    modal.querySelector('.confirm-no').addEventListener('click', () => {
        document.body.removeChild(overlay);
    });
    
    // Close on overlay click
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            document.body.removeChild(overlay);
        }
    });
    
    // Close on escape key
    const handleEscape = (e) => {
        if (e.key === 'Escape') {
            document.body.removeChild(overlay);
            document.removeEventListener('keydown', handleEscape);
        }
    };
    document.addEventListener('keydown', handleEscape);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .alert {
        transition: opacity 0.3s ease;
    }
    
    .progress-fill {
        transition: width 1s ease-out;
    }
`;
document.head.appendChild(style);
