<?php
require_once 'config.php'; 

// Function to safely echo user content
function e($string) {
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Initialize variables
$authorInfo = null;
$authorBooks = [];

// Check if an author_id is set in the query string
if (isset($_GET['author_id']) && is_numeric($_GET['author_id'])) {
    $authorId = $_GET['author_id'];

    // Use the database connection from config.php
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch author's information
    if ($stmt = $conn->prepare("SELECT * FROM authors WHERE author_id = ?")) {
        $stmt->bind_param("i", $authorId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $authorInfo = $result->fetch_assoc();
        }
        $stmt->close();
    }

    // Fetch author's books
    if ($stmt = $conn->prepare("SELECT * FROM books WHERE author_id = ?")) {
        $stmt->bind_param("i", $authorId);
        $stmt->execute();
        $booksResult = $stmt->get_result();
        while ($book = $booksResult->fetch_assoc()) {
            $authorBooks[] = $book;
        }
        $stmt->close();
    }

    // Close database connection
    $conn->close();
} else {
    echo "Author ID not specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Author</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="/Assignment2_Group32/CSS/authorInfoStyle.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <header class="head">
      <div class="logo">
          <p>ZZLibrary</p>
      </div>
      <nav>
          <a href="index.php" id="aHome" class="navA">Home</a>
          <a href="myBooks.php" id="amyBooks" class="navA">MyBooks</a>
          <a href="account.php" class="navA"><img src="images/user.png" alt="profilePic" width="100" height="95"></a>
      </nav>
    </header>
    <main>
      <div class="authorInfo">
          <h3 class="nameTitle">Author Name</h2>
          <p class="name">blah blah</p>
          <h3 class="Birth">Born:</h2>
          <p class="dob">mm/dd/yy</p>
      </div>
      <div class="about">
        <h3>About</h3>
      </div>
      <div class="books">
        <h3 class="books-heading">Author's books</h3>
        <div class="bookCard">
          <img src="images/book1.png" alt="A book cover" class="book-cover">
          <h3 class="bookTitle">Title</h3>
            <div class="bookRating">
              <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              <span class="reviews">Number of reviews</span>
              <button class="want-to-read-button">Want to read</button>
            </div>
        <!-- Repeat the book section as needed -->
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
</body>
</html>
