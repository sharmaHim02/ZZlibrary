document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        if (!validate()) {
            event.preventDefault(); // Prevent form from submitting if invalid
        }
    });
});

function showError(input, message) {
    const formField = input.parentElement;
    let error = formField.querySelector('.error-message');
    if (!error) {
        error = document.createElement('div');
        error.className = 'error-message';
        error.style.color = 'red'; // Style error messages in red
        formField.appendChild(error);
    }
    error.textContent = message;
    input.classList.add('error');
}

function clearError(input) {
    const formField = input.parentElement;
    let error = formField.querySelector('.error-message');
    if (error) {
        formField.removeChild(error);
    }
    input.classList.remove('error');
}

document.querySelectorAll('input').forEach(function(input) {
    input.addEventListener('input', function() {
        if (this.validity.valid) {
            clearError(this);
        }
    });
});

function validate() {
    let isValid = true;
    let firstInvalidField = null;

    const name = document.getElementById('name');
    const phoneNumber = document.getElementById('phn');
    const email = document.getElementById('email');
    const password = document.getElementById('pass');

    // Name validation: cannot exceed 30 characters, no whitespace allowed
    if (name.value.length > 30 || name.value.trim() === '') {
        showError(name, 'Name must be less than 30 characters and cannot be empty.');
        isValid = false;
        firstInvalidField = firstInvalidField || name;
    } else {
        clearError(name);
    }

    // Phone Number validation: Canadian format, 10 digits
    if (!/^\d{10}$/.test(phoneNumber.value)) {
        showError(phoneNumber, 'Invalid phone number format. Must be 10 digits.');
        isValid = false;
        firstInvalidField = firstInvalidField || phoneNumber;
    } else {
        clearError(phoneNumber);
    }

    // Email validation
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showError(email, 'Please enter a valid email address.');
        isValid = false;
        firstInvalidField = firstInvalidField || email;
    } else {
        clearError(email);
    }

    // Password validation: at least one uppercase, one lowercase, one special character, at least 6 characters
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d{6,})(?=.*[!@#$%^&*]).*$/.test(password.value)) {
        showError(password, 'Password must contain at least one uppercase letter, one lowercase letter, at least 6 digits, one special character.');
        isValid = false;
        firstInvalidField = firstInvalidField || password;
    } else {
        clearError(password);
    }

    if (firstInvalidField) {
        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    return isValid;
}
