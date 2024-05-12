// Get the update avatar button, file input element, and avatar image element
const updateAvatarButton = document.getElementById('updateAvatarButton');
const fileInput = document.getElementById('fileInput');
const avatar = document.getElementById('avatar');

// Trigger the file input's click event when the update avatar button is clicked
updateAvatarButton.addEventListener('click', function() {
    fileInput.click();
});

// Change the avatar picture when a new file is selected
function changeAvatar() {
    const file = fileInput.files[0]; // Get the file chosen by the user
    if (file) {
        // Create a URL object and update the avatar image's src attribute to show the new avatar
        avatar.src = URL.createObjectURL(file);
    }
}
