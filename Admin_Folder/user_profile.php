<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['full_name'])) {
    // If the user is logged in, welcome them with their name
    $username = $_SESSION['full_name'];
    echo "$username!";
} else {
    // If the user is not logged in, prompt them to log in
    echo "Welcome! Please log in to access your account.";
}
?>
