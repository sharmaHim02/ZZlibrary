<?php
session_start();
// Include config file
require_once "config.php";

// Check if the user is already logged in, if yes then redirect to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){

        $sql = "SELECT user_id, email, password, fullname FROM users WHERE email = ?";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($id, $email, $hashed_password, $fullname);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["fullname"] = $fullname; // Add full name to session
                        
                            // Redirect user to welcome page
                            header("location: index.php");
                            exit; // Add exit to stop further execution
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // Email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZ Library Login</title>
    <link href="/Assignment2_Group32/CSS/loginStyle.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="head">
            <div class="logo">
                <p>ZZLibrary</p>
            </div>
            <nav>
                <a href="index.php" class="navA">Home</a>
            </nav>
        </header>
        <main class="formContainer">
                <div class="formText">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="inputEmail">
                            <label for="email" class="email">Email</label><br>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
                            <span class="error"><?php echo $email_err; ?></span>
                        </div>
                        <div class="inputPass">
                            <label for="password" class="passwd">Password</label><br>
                            <input type="password" id="password" name="password" placeholder="Enter your password">
                            <span class="error"><?php echo $password_err; ?></span>
                        </div>
                        <div class="inputSubmit">
                            <button type="submit" class="submitData">Login</button>
                            <button type="button" onclick="redirectToSignUp()" class="redirectBttn" >Don't have an account? Sign Up</button><br>
                            <a href="updatePassword.php">Forgot Password?</a>
                        </div>
                        <span class="error"><?php echo $login_err; ?></span>
                    </form>
                </div>
        </main>
        <footer>
            <div class="footerBg">
                <div class="footerFirst">
                    <p>Copyright 2024 &copy; ZZ Library</p>
                    <p>Website By Jiahan, Pujal, Himanshu</p>
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
    function redirectToSignUp() {
        window.location.href = "signup.php";
    }
</script>
</html>
