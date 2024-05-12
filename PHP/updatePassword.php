<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZ Library Update Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/Assignment2_Group32/CSS/updatePasswordStyle.css" rel="stylesheet">
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
                <?php
                session_start();
                if (isset($_POST['email']) && isset($_POST['oldPassword']) && isset($_POST['newPassword'])) {
                    // Database connection code here
                    include_once 'config.php';

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $email = $_POST['email'];
                    $oldPassword = $_POST['oldPassword'];
                    $newPassword = $_POST['newPassword'];

                    // Check if old password matches
                    // Hash the old password provided in the form
                    $oldPasswordHash = password_hash($oldPassword, PASSWORD_DEFAULT);

                    // Check if old password matches
                    $sql = "SELECT * FROM users WHERE email='$email'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if (password_verify($oldPassword, $row['password'])) {
                            // Update password
                            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                            $sql_update = "UPDATE users SET password='$newPasswordHash' WHERE email='$email'";
                            if ($conn->query($sql_update) === TRUE) {
                                echo "<p>Password updated successfully.</p>";
                            } else {
                                echo "Error updating password: " . $conn->error;
                            }
                        } else {
                            echo "<p>Invalid old password.</p>";
                        }
                    } else {
                        echo "<p>Email not found.</p>";
                    }

                    $conn->close();
                }
                ?>
                <form action="" method="post" onsubmit="return validateForm()">
                    <div class="Uemail">
                        <label for="email" class="email">Email</label><br>
                        <input type="email" id="email" name="email" placeholder="Type your email" required>
                    </div>
                    <div class="Upass">
                        <label for="oldPass" class="oldPass">Old Password</label><br>
                        <input type="password" id="oldPass" name="oldPassword" placeholder="Type your old password" required>
                    </div>
                    <div class="Upass">
                        <label for="newPass" class="newPass">New Password</label><br>
                        <input type="password" id="newPass" name="newPassword" placeholder="Type a new strong password" required>
                    </div>
                    <div class="inputSubmit">
                        <button type="submit" class="submitData">Update Password</button><br>
                    </div>
                </form>
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
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var oldPassword = document.getElementById("oldPass").value;
            var newPassword = document.getElementById("newPass").value;

            // Basic validation
            if (email.trim() == "" || oldPassword.trim() == "" || newPassword.trim() == "") {
                alert("Please fill in all fields.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
