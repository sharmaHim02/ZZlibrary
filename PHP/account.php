<?php
// Start or resume the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Retrieve user information from session variables
$name = $_SESSION["fullname"]; 
$email = $_SESSION["email"];

// Log out process
if(isset($_POST["logout"])){
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to login page
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZLibrary-Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/Assignment2_Group32/CSS/accountStyle.css" rel="stylesheet">
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
            </nav>
        </header>
        <main>
            <div class="profilePic">
                <img src="/Assignment2_Group32/images/user.png" alt="Your profile photo" title="Your profile photo">
            </div>
            <div class="userInfo">
                <p><strong>Name: <?php echo $name; ?></strong></p>
                <p><strong>Email: <?php echo $email; ?></strong></p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <button type="submit" name="logout">Log Out</button>
            </form>
            <div class="button2">
                <a href="updatePassword.php" class="changepasswd"> <button id="changePassword">Change my password</button></a>
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
    <!--Add profilePohot.js-->
    <script src=" "></script>
</body>
</html>