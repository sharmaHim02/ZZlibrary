<?php

// Database configuration
define('DB_HOST', 'localhost'); // Your database host (usually 'localhost' or '127.0.0.1')
define('DB_USER', 'root'); // Your database username
define('DB_PASS', ''); // Your database password
define('DB_NAME', 'zzlibrarydatabase'); // Your database name

// Establish database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
