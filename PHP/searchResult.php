<?php
include_once 'config.php';

if (isset($_GET['q'])) {
    $search_query = $_GET['q'];

    $sql = "SELECT * FROM books WHERE title LIKE '%$search_query%' OR isbn LIKE '%$search_query%'";

    $result = $conn->query($sql);

    $search_results = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    } else {
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZlibrary-Search Result</title>
    <link href="/Assignment2_Group32/CSS/searchResultStyle.css"  rel="stylesheet">
</head>
<body>
    <header class="head">
        <div class="logo">
            <p>ZZLibrary</p>
        </div>
        <nav>
            <a href="index.php" class="navA">Home</a>
            <a href="myBooks.php" class="navA">MyBooks</a>
            <a href="account.php" class="navA"><img src="/Assignment2_Group32/images/user.png" alt="profilePic" width="100" height="95"></a>
        </nav>
    </header>
    <main>
        <div class="barBg">
            <form action="index.php" method="get" class="searchForm">
                <div class="searchbar">
                    <input type="text" class="searchbarInput" name="q" placeholder="search for title,author,ISBN">
                    <button type="submit" class="searchbarButton">&#128269;</button>
                </div>
            </form>
        </div>
        <div class="heading">
            <p>Search Results</p>
        </div>
        <div class="searchResults">
        <div class="searchResults">
        <div class="searchResults">
            <?php
            if(!empty($search_results)) {
                foreach($search_results as $result) {
                    echo "<div class='book'>";
                    echo "<img src= {$result['cover_image']}>";
                    echo "<h2>Title: {$result['title']}</h2>";
                    echo "<p>Genre: {$result['genre']}</p>";
                    echo "<p>Publication Year: {$result['publication_year']}</p>";
                    echo "<p>ISBN: {$result['isbn']}</p>";
                    echo "<p>Summary: {$result['summary']}</p>";
                    // Add the form to add the book to the wanttoread table
                    echo "<form action='addToWantToRead.php' method='post'>";
                    echo "<input type='hidden' name='book_id' value='{$result['book_id']}'>";
                    echo "<button type='submit'>Add to Want to Read</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>No results found for '$search_query'.</p>";
            }
            ?>
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
                    <a href="" class="x">X</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
