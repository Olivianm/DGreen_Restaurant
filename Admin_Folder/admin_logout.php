<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the admin login page
header("Location: ../Admin_Folder/admin_login.php");
exit;
?>
