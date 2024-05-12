document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.querySelector('.searchForm'); // Get the search form
    const searchInput = document.querySelector('input[name="userInput"]'); // Get the search input field

    searchForm.addEventListener('submit', function(event) {
        // Check if the search input field is empty
        if (!searchInput.value.trim()) {
            event.preventDefault(); // Prevent form submission
            alert('Search content cannot be empty!'); // Show a message to the user
            searchInput.focus(); // Focus on the search input field
        }
    });
});
