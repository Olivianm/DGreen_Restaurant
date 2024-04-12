<?php
// Include the database connection file
include_once "../Setting_Folder/connection.php";

// Define an error variable to hold error messages
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data 
    $fname = $_POST["full_name"];
    $email = $_POST["email"];
    $address = $_POST["Address"];
    $pnumber = $_POST["pnumber"];
    $passwrd = $_POST["password"]; 
    $gender = $_POST["gender"];
    $isAdmin = isset($_POST["is_admin"]) ? 1 : 0; // Check if the user is registering as an admin
  
    // Check if the email is a company email for admin registration
    if ($isAdmin && $email === 'info@dgreen.com') {
        // Prepare SQL statement to insert data into the `people` table
        $sql = "INSERT INTO people (full_name, email, phone_number, address, gender, password, is_admin) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
  
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
  
        // Bind parameters
        $stmt->bind_param("ssssssi", $fname, $email, $pnumber, $address, $gender, $passwrd, $isAdmin);
  
        // Execute the SQL statement
        if ($stmt->execute()) {
            // Redirect to the admin dashboard if registered as admin
            if ($isAdmin) {
                // Start the session
                session_start();
                
                // Set the person_id session variable
                $_SESSION["person_id"] = $conn->insert_id;
                
                // Redirect to the admin dashboard
                header("Location: ../ViewFolder/admin_dashboard.php");
                exit;
            } 
        } else {
            // Handle database insertion error
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
    
    else {
      // Redirect to the login page for regular users
      header("Location: ../Login_Folder/login.php");
      exit;
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | DGreen Restaurant</title>
  <link rel="stylesheet" href="style.css">
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

    .registerForm {
      display: flex;
      background-color: green;
    }

    .container {
      background-color: wheat;
      width: 300px;
      margin: 10px;
      font-size: 15px;
    }
  </style>
</head>
<body>

<div class="container">
  <div>
    <h2>Register</h2>
    <form id="registerForm" method="post">
      <label for="fname">Full Name:</label><br>
      <input type="text" placeholder="Oliver Mushi" name="full_name" required><br><br>

      <label for="email">Email:</label><br>
      <input type="email" placeholder="oliver@gmail.com" name="email" required> <br><br>

      <label for="Address">Address:</label><br>
      <input type="text" placeholder="Avenue123" name="Address" required><br><br>

      <label for="pnumber">Phone Number:</label><br>
      <input type="tel" placeholder=" +254000000000" name="pnumber" required><br><br>

      <label for="passwrd">Password</label><br>
      <input type="password" placeholder="**********" name="password" required><br><br>

      <h3>Gender:</h3>
      <input type="radio" name="gender" value="Male" required>
      <label for="male">Male:</label><br>

      <input type="radio" name="gender" value="female" required>
      <label for="female">Female:</label><br><br>

      <input type="checkbox" name="is_admin" id="is_admin">
      <label for="is_admin">Register as admin</label><br><br>

      <button type="submit">Register</button>

    </form>
    <?php 
    if (!empty($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
    <p>Already have an account? <a href="../Login_Folder/login.php">Login here</a></p>
  </div>
</div>

  <script>
    // function redirectToPage() {
    //   // Redirect to the desired page
    //   window.location.href = "../Login_Folder/login.php";
    //   return false; // Prevent default form submission
    // }
  </script>

<script src="script.js"></script>
</body>
</html>
