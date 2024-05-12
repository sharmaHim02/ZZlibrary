document.addEventListener('DOMContentLoaded', function () {
    const contactEmail = document.getElementById('contactEmail');
    const contactPhone = document.getElementById('contactPhone');
    const verificationSection = document.getElementById('verificationSection');
    const emailRadioButton = document.getElementById('email');
    const phoneRadioButton = document.getElementById('phone');
    const newPasswordSection = document.getElementById('newPasswordSection');
    const form = document.querySelector('form');

    // Function to toggle contact method input and verification section
    function toggleContactMethod() {
        if (emailRadioButton.checked) {
            contactEmail.style.display = 'block';
            contactPhone.style.display = 'none';
        } else if (phoneRadioButton.checked) {
            contactEmail.style.display = 'none';
            contactPhone.style.display = 'block';
        }
        verificationSection.style.display = 'block';
    }

    // Add event listeners to radio buttons
    emailRadioButton.addEventListener('change', toggleContactMethod);
    phoneRadioButton.addEventListener('change', toggleContactMethod);

    function sendVerificationCode(method) {
        if (method === 'email') {
            // Logic to send verification code to email
            console.log('Verification code sent to email.');
        } else if (method === 'phone') {
            // Logic to send verification code to phone
            console.log('Verification code sent to phone.');
        }
        // Show the verification code input field
        document.getElementById('verificationSection').style.display = 'block';
    }
    
    form.addEventListener('submit', function (event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Here we would check if the contact method and verification code are correct
        // If correct, show the new password fields, otherwise, display an error message

        // This is a placeholder for the actual verification logic
        const isVerified = true; // You will need to replace this with actual verification code
        
        if (isVerified) {
            newPasswordSection.style.display = 'block';
            form.action = '/update-your-password-here'; // Set the form's action to the password update endpoint
        } else {
            // Show an error message to the user
            alert('The verification code is incorrect. Please try again.');
        }
    });
});
