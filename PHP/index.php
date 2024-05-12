<?php
include_once 'config.php';

if (isset($_GET['q'])) {
    $search_query = $_GET['q'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search_query%' OR isbn LIKE '%$search_query%'";
    if (!empty($search_query)) {
        header("Location: searchResult.php?q=" . urlencode($search_query));
        exit();
    } else {
        echo "Search query is empty. Cannot perform redirection.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZ Library</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/Assignment2_Group32/CSS/indexStyle.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="head">
            <div class="logo">
                <p>ZZLibrary</p>
            </div>
            <nav>
                <a href="myBooks.php" class="navA">MyBooks</a>
                <a href="login.php" class="navA">LogIn</a>
                <a href="signup.php" class="navA">SignUp</a>
                <a href="account.php" class="navA"><img src="/Assignment2_Group32/images/user.png" alt="profilePic" width="100" height="95"></a>
            </nav>
        </header>
        <main>
            <div class="slideOne">
                <div class="searchBg">
                    <img src="/Assignment2_Group32/images/shiromani-kant-tHKlDb5EzN4-unsplash.jpg" alt="images of various books.">
                </div>
                <div class="slide1Text">
                    <form action="index.php.php" method="get" class="searchForm">
                        <div class="searchbar">
                            <input type="text" class="searchbarInput" name="q" placeholder="search for title, author, ISBN">
                            <button type="submit" class="searchbarButton">
                             &#128269;
                            </button>
                        </div>
                    </form>
                    <div class="searchopt">
                        <a href="">search options</a>
                    </div>
                </div>
            </div>
            <div class="slideTwo">
                <h2 class="slide2H">Books You Might Like</h2>
                <div class="recmdBooks">
                    <div class="bookBg">
                        <a href="" class="bookCover"><img src="/Assignment2_Group32/images/book1.png" alt="cover of the book"></a>
                        <p><strong>Name:</strong><br>
                            <strong>Author:</strong><br>
                            <strong>Year:</strong><br>
                            <strong>ISBN:</strong></p>
                    </div>
                    <div class="bookBg">
                        <a href="" class="bookCover"><img src="/Assignment2_Group32/images/book2.png" alt="cover of the book"></a>
                        <p><strong>Name:</strong><br>
                            <strong>Author:</strong><br>
                            <strong>Year:</strong><br>
                            <strong>ISBN:</strong></p>
                    </div>
                    <div class="bookBg">
                        <a href="" class="bookCover"><img src="/Assignment2_Group32/images/book3.png" alt="cover of the book"></a>
                        <p><strong>Name:</strong><br>
                            <strong>Author:</strong><br>
                            <strong>Year:</strong><br>
                            <strong>ISBN:</strong></p>
                    </div>
                    <div class="bookBg">
                        <a href="" class="bookCover"><img src="/Assignment2_Group32/images/book4.png" alt="cover of the book"></a>
                        <p><strong>Name:</strong><br>
                            <strong>Author:</strong><br>
                            <strong>Year:</strong><br>
                            <strong>ISBN:</strong></p>
                    </div>
                    <div class="bookBg">
                        <a href="" class="bookCover"><img src="/Assignment2_Group32/images/book5.png" alt="cover of the book"></a>
                        <p><strong>Name:</strong><br>
                            <strong>Author:</strong><br>
                            <strong>Year:</strong><br>
                            <strong>ISBN:</strong></p>
                    </div>
                    <div class="bookBg">
                        <a href="" class="bookCover"><img src="/Assignment2_Group32/images/book6.png" alt="cover of the book"></a>
                        <p><strong>Name:</strong><br>
                            <strong>Author:</strong><br>
                            <strong>Year:</strong><br>
                            <strong>ISBN:</strong></p>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="footerBg">
                <div class="footerFirst">
                    <p>Copyright 2024 &copy; ZZ Library</p>
                    <p>Website By Jiahan,Pujal,Himanshu</p>
                </div>
                <div class="footerSecond">
                    <p>Socials</p>
                    <div class="socialLinks">
                    <a href="" class="ig">Instagram</a><br>
                    <a href="" class="fb">Facebook</a><br>
                    <a href="" class="x">X</a></div>
                </div>
            </div>
        </footer>
    </div>
</body>
<script>
    // JavaScript code to handle live search updates
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.querySelector('.searchForm');
        const searchbarInput = document.querySelector('.searchbarInput');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const searchQuery = searchbarInput.value;

            // Redirect to searchResult.php with the search query
            window.location.href = `searchResult.php?q=${encodeURIComponent(searchQuery)}`;

            document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.querySelector('.searchForm');
    const searchbarInput = document.querySelector('.searchbarInput');

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const searchQuery = searchbarInput.value;

        // Get the search results if needed (not shown in your provided code)
        // For now, assume searchResults is an empty array
        const searchResults = result ;

        // Encode the search results as a JSON string and URL encode it
        const encodedResults = encodeURIComponent(JSON.stringify(searchResults));

        // Redirect to searchResult.php with the search query and results
        window.location.href = `searchResult.php?q=${encodeURIComponent(searchQuery)}&result=${encodedResults}`;
    });
});
        });
    });
</script>
</html>