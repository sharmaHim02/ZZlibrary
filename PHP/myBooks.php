<?php
// Include the database configuration file
include 'config.php';

// Start the session to store the state across page reloads
session_start();

// Assuming $user_id is already known and stored in the session
$user_id = $_SESSION['user_id'] ?? 5; // Replace 1 with actual user_id

// Initialize an empty array for book details
$books = [];

// Check which button was clicked and set the appropriate table name in the session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = '';
    if (isset($_POST['want_to_read'])) {
        $table = 'wanttoread';
    } elseif (isset($_POST['currently_reading'])) {
        $table = 'currentlyreading';
    } elseif (isset($_POST['read'])) {
        $table = 'readbooks';
    }
    
    // Fetch the books from the corresponding table if a table was set
    if ($table) {
        $_SESSION['current_table'] = $table;
        $stmt = $conn->prepare("
        SELECT b.title, b.cover_image, a.author_name
        FROM {$table} t
        JOIN books b ON t.book_id = b.book_id
        JOIN authors a ON b.author_id = a.author_id
        WHERE t.user_id = ?
    ");
    
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $books = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}

// Get the current table from the session or default to 'wanttoread'
$current_table = $_SESSION['current_table'] ?? 'wanttoread';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ZZlibrary-My Books</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/Assignment2_Group32/CSS/myBooksStyle.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <header>
            <div class="logo">
                <p>ZZLibrary</p>
            </div>
            <nav>
                <a href="index.php" id="navAnkr" class="navA">Home</a>
                <a href="account.php" id="navImg" class="navA"><img src="/Assignment2_Group32/images/user.png" alt="profilePic" width="100" height="95"></a>
            </nav>
    </header>

        <main>
            <div class="heading">
                <p>My Books</p>
            </div>
            <div class="buttons">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="button1">
                        <button type="submit" name="want_to_read" id="want-to-read-btn">Want to read</button>
                    </div>
                    <div class="button2">
                        <button type="submit" name="currently_reading" id="currently-reading-btn">Currently reading</button>
                    </div>
                    <div class="button3">
                        <button type="submit" name="read" id="read-btn">Read</button>
                    </div>
                </form>
            </div>

            <div class="bookInfo">
                <!-- PHP to loop through books and display them -->
                <?php foreach ($books as $book): ?>
                    <div class="bookCard">
                        <img src="<?= $book['cover_image']; ?>" class="cover" alt="cover image for book">
                        <p><strong>Title:</strong> <?= $book['title']; ?></p>
                        <p><strong>Author:</strong> <?= $book['author_name']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </main>

        <!-- Footer content -->
    </div>

</body>
</html>
