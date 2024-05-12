<?php
// Database connection
require_once "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$name = $email = $phone = $password = "";
$name_err = $email_err = $phone_err = $password_err = "";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $sql = "SELECT email FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = trim($_POST["email"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Validate phone number
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        $sql = "SELECT phone_number FROM users WHERE phone_number = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_phone);
            $param_phone = trim($_POST["phone"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $phone_err = "This phone number is already taken.";
                } else {
                    $phone = trim($_POST["phone"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have at least 8 characters.";
    } elseif (!preg_match('/[A-Z]/', $_POST["password"])) {
        $password_err = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match('/[a-z]/', $_POST["password"])) {
        $password_err = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match('/[0-9]/', $_POST["password"])) {
        $password_err = "Password must contain at least one digit.";
    } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
        $password_err = "Password must contain at least one special character.";
    } else {
        $password = trim($_POST["password"]);
    }

    // If no errors, insert data into database
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($password_err)) {
        $sql = "INSERT INTO users (fullname, email, phone_number, password) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $param_name, $param_email, $param_phone, $param_password);
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZ Library SignUp</title>
    <link href="/Assignment2_Group32/CSS/signUp.css" rel="stylesheet">
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
                    <div class="Uname">
                        <label for="name" class="uname">Name</label><br>
                        <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="Type your name">
                        <span class="error"><?php echo isset($name_err) ? $name_err : ''; ?></span>
                    </div>
                    <div class="Uphn">
                        <label for="phn" class="phone">Phone Number</label><br>
                        <input type="tel" id="phn" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Type your 10 digit phone number">
                        <span class="error"><?php echo isset($phone_err) ? $phone_err : ''; ?></span>
                    </div>
                    <div class="Uemail">
                        <label for="email" class="email">Email</label><br>
                        <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Type your email"><br>
                        <p class="error"><?php echo isset($email_err) ? $email_err : ''; ?></p>
                    </div>
                    <div class="Upass">
                        <label for="pass" class="passwd">Password</label><br>
                        <input type="password" id="pass" name="password" placeholder="Type a strong password"><br>
                        <p class="error"><?php echo isset($password_err) ? $password_err : ''; ?></p>
                    </div>
                    <div class="inputSubmit">
                        <button type="submit" class="submitData">Create an account</button><br>
                    </div>
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
                        <a href="" class="x">X</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
