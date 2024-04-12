<?php
// Starting the session using PHP session method
session_start();

// Include the connection file
include('../Setting_Folder/connection.php');

// Check if login button was clicked
if (!isset($_POST['login'])) {
    // Stop processing and provide appropriate message or redirection
    header("Location: ../Login_Folder/login.php?error=login_button_not_clicked");
    exit();
}

// Collect form data and store in variables
$email = $_POST['email'];
$password = $_POST['password'];

// Write a query to SELECT a record from the people table using the email
$query = "SELECT * FROM people WHERE email = ?";

// Prepare the query
$stmt = $connection->prepare($query);

// Bind parameters
$stmt->bind_param("s", $email);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if any row was returned
if ($result->num_rows == 0) {
    header("Location: ../Login_Folder/login.php?error=user_not_registered");
    exit();
}

// Fetch the record
$user = $result->fetch_assoc();

// Verify password user provided against database record using the PHP method password_verify()
if (!password_verify($password, $user['password'])) {
    // Verification fails, provide appropriate response
    header("Location: ../Login_Folder/login.php?error=incorrect_password");
    exit();
}

// Create a session for user id and role id
$_SESSION['person_id'] = $user['person_id'];

// Redirect to landing page
header("Location: ../ViewFolder/home.php");
exit();
?>
