document.addEventListener('DOMContentLoaded', function() {
    const updatePasswordForm = document.querySelector('form'); // Assuming there's only one form on your update password page.

    updatePasswordForm.addEventListener('submit', function(event) {
        let isValid = true;

        const emailInput = document.getElementById('email');
        const newPassInput = document.getElementById('newPass');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d{6,})(?=.*[!@#$%^&*]).*$/;

        // Validate email
        if (!emailPattern.test(emailInput.value)) {
            showErrorMessage(emailInput, 'Please enter a valid email address.');
            isValid = false;
        } else {
            clearErrorMessage(emailInput);
        }

        // Validate new password
        if (!passwordPattern.test(newPassInput.value)) {
            showErrorMessage(newPassInput, 'New password must contain at least one uppercase letter, one lowercase letter, at least 6 digits, one special character.');
            isValid = false;
        } else {
            clearErrorMessage(newPassInput);
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails.
        }
    });
});

function showErrorMessage(inputElement, message) {
    clearErrorMessage(inputElement); // Clear any existing errors first.

    const error = document.createElement('div');
    error.className = 'error-message';
    error.style.color = 'red';
    error.innerText = message;

    inputElement.classList.add('input-error'); // Optionally add error styling to input field
    inputElement.parentNode.insertBefore(error, inputElement.nextSibling); // Insert error message right after the input field
}

function clearErrorMessage(inputElement) {
    const currentError = inputElement.parentNode.querySelector('.error-message');
    if (currentError) {
        inputElement.parentNode.removeChild(currentError);
    }
    inputElement.classList.remove('input-error'); // Optionally remove error styling from input field
}
