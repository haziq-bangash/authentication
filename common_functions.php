<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "authentication");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize input data
function sanitizeInput($input)
{
    $sanitized = trim($input);
    $sanitized = stripslashes($sanitized);
    $sanitized = htmlspecialchars($sanitized);
    return $sanitized;
}

function getBaseUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $parentUrl = rtrim(dirname($protocol . "://" . $host . $path), '/');
    return $parentUrl;
}

// Function to check if a user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Function to get the current user's ID
function getUserId()
{
    return $_SESSION['user_id'];
}

// Function to get a user by ID
function getUser($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
}