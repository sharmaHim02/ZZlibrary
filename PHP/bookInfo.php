<?php
require_once 'config.php'; 

// Function to safely echo user content
function e($string) {
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Initialize book information variable
$bookInfo = null;
$relatedBooks = [];
$bookId = 1; // For demonstration purposes. Replace with a variable or a method to get the actual book ID.

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch book information
if ($stmt = $conn->prepare("SELECT * FROM books WHERE book_id = ?")) {
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $bookInfo = $result->fetch_assoc();
    }
    $stmt->close();
}

// Fetch related books or recommendations 
if ($stmt = $conn->prepare("SELECT * FROM books WHERE book_id != ? LIMIT 3")) {
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $relatedResult = $stmt->get_result();
    while ($relatedBook = $relatedResult->fetch_assoc()) {
        $relatedBooks[] = $relatedBook;
    }
    $stmt->close();
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZLibrary-BookInfo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/Assignment2_Group32/CSS/bookInfoStyle.css" rel="stylesheet">
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
        <div class="col1">
          <div class="bookCover">
          <img class="cover" src="/Assignment2_Group32/images/book1.png" alt="Book Cover">
          </div>
          <div class="button">
            <select class="dropdown" id="bookStatus">
              <option value="want-to-read">Want to read</option>
              <option value="currently-reading">Currently reading</option>
              <option value="read">Read</option>
            </select>
          </div>
        </div>
        <div class="col2">
          <div class="title">
              <p class="book-title">Book Title</p>
          </div>
          <div class="aname">
              <p class="author-name">Author Name</p>
          </div>
          <div class="info">
            <table>
              <tr>
                <th>Genre:</th>
                <td>blah blah</td>
                <th>Year:</th>
                <td>1999</td>
              </tr>
              <tr>
                <th>Language:</th>
                <td>English</td>
                <th>Edition:</th>
                <td>ask your mom</td>
              </tr>
              <tr>
                <th>ISBN:</th>
                <td>1G3k4H</td>
                <th>Publisher:</th>
                <td>Name</td>
              </tr>
            </table>
          </div>
          <div class="intro">
            <p class="summary">Book Summary</p>
            <p>null</p>
          </div>
          <div class="reviews-section">
            <h2>Community Rating</h2>
            <div class="review">
            </div>
          </div>
        </div>
        <div class="col3">
          <div class="recmdBooks">
            <div class="lable">
              <p>You May Intrest</p>
            </div>
            <hr>
            <div id="bookBg1" class="bookBg">
              <a href="" class="bookCover"><img src="images/book2.png" alt="cover of the book"></a>
            </div>
            <div id="bookBg2" class="bookBg">
              <a href="" class="bookCover"><img src="images/book3.png" alt="cover of the book"></a>
            </div>
            <div id="bookBg3" class="bookBg">
              <a href="" class="bookCover"><img src="images/book4.png" alt="cover of the book"></a>
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
</body>
</html>
