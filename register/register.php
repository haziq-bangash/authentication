<?php
session_start();
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "authentication");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($name) || empty($email) || empty($password)) {
        // Registration failed, redirect to registration page with error message
        $_SESSION["register_error"] = "Please fill out all fields";
        header("Location: register_page.php");
        exit();
    }

    // Check if the username already exists in the database
    $checkSql = "SELECT id FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkSql);
    if (mysqli_num_rows($checkResult) > 0) {
        // Username already taken, redirect to registration page with error message
        $_SESSION["register_error"] = "Email already taken";
        header("Location: register_error.php");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $insertSql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
    if (mysqli_query($conn, $insertSql)) {
        // Registration successful, redirect to login page
        header("Location: ../login/login_page.php");
        exit();
    } else {
        // Registration failed, redirect to registration page with error message
        $_SESSION["register_error"] = "Registration failed";
        header("Location: register_page.php");
        exit();
    }
}
mysqli_close($conn);
