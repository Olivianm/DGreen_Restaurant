<?php
// Start the session
session_start();

// Include the database connection file
include_once "../Setting_Folder/connection.php";

// Define an error variable to hold error messages
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data 
    $email = $_POST["email"];
    $passwrd = $_POST["password"];

    // Prepare SQL statement to fetch admin data from the database
    $sql = "SELECT * FROM people WHERE email = ? AND password = ? AND is_admin = 1";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ss", $email, $passwrd);

    // Execute the SQL statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if admin exists
    if ($result->num_rows == 1) {
        // Admin found, set session variables and redirect to admin dashboard
        $row = $result->fetch_assoc();

        // Set session variables
        $_SESSION["person_id"] = $row["person_id"];

        // Redirect to admin dashboard
        header("Location: ../ViewFolder/admin_dashboard.php");
        exit;
    } else {
        // Admin not found, display error message
        $error_message = "Invalid email or password.";
    }

    // Close the prepared statement
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | DGreen Restaurant</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('../images/R1.jpg');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
    }

    .loginForm {
      background-color: wheat;
      width: 300px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .loginForm h2 {
      margin-bottom: 20px;
    }

    .loginForm input[type="text"],
    .loginForm input[type="password"] {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .loginForm button {
      width: 100%;
      padding: 10px;
      background-color: green;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="loginForm">
    <h2>Admin Login</h2>
    <form method="post">
      <input type="text" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
    </form>
    <?php if (!empty($error_message)) { ?>
      <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>
  </div>
</body>
</html>
