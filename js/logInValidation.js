document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('form'); // Assuming there's only one form on your login page

    loginForm.addEventListener('submit', function(event) {
        const emailInput = document.getElementById('email');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if the email input matches the required format
        if (!emailPattern.test(emailInput.value)) {
            event.preventDefault(); // Prevent form submission
            
            // Create error message element
            const errorMessage = document.createElement('div');
            errorMessage.className = 'error-message';
            errorMessage.style.color = 'red';
            errorMessage.innerText = 'Please enter a valid email address.';
            
            // Clear previous error message (if any)
            clearErrorMessage(emailInput);

            // Insert error message right after the input field
            emailInput.classList.add('input-error');
            emailInput.parentNode.insertBefore(errorMessage, emailInput.nextSibling);
        }
    });
});

function clearErrorMessage(inputElement) {
    const currentError = inputElement.parentNode.querySelector('.error-message');
    if (currentError) {
        inputElement.parentNode.removeChild(currentError);
    }
    inputElement.classList.remove('input-error'); // Optionally remove error styling from input field
}
