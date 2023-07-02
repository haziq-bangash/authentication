<?php
session_start();
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "authentication");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        // Login failed, redirect to login page with error message
        $_SESSION["login_error"] = "Please fill out all fields";
        header("Location: login_page.php");
        exit();
    }
    // Query the database for the user
    $sql = "SELECT id, email, password FROM users WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Retrieve the hashed password from the database
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row["password"];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Authentication successful, set session variables
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["email"];
            // Redirect to the authenticated page
            header("Location: ../index.php");
            exit();
        }
    }

    // Authentication failed, redirect to login page with error message
    $_SESSION["login_error"] = "Invalid username or password";
    header("Location: login_php.php");
    exit();
}
mysqli_close($conn);
