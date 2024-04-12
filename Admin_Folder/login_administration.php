<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin | DGreen Restaurant</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body{
      background-image: url("../images/R2.jpg");
      margin: 0;
      padding: 0;
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
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
    <?php
    // Start the session
    session_start();

    // Include the database connection file
    include_once "../Setting_Folder/connection.php";

    // Check if the user information is set in the session
    if (isset($_SESSION["user_info"])) {
        // Retrieve user information from session
        $user = $_SESSION["user_info"];

        // Add user information to the login table in the database
        $insertQuery = "INSERT INTO login (user_id, email, password) VALUES (?, ?, ?)";
        
        // Prepare the insert statement
        $stmt = $conn->prepare($insertQuery);
        
        // Bind parameters
        $stmt->bind_param("iss", $user['user_id'], $user['email'], $user['password']);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "User added to login table successfully.";
        } else {
            echo "Error adding user to login table: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
        
        // Unset the user_info session variable after adding to the database
        unset($_SESSION["user_info"]);
    } else {
        // Redirect to login page if user information is not set in session
        header("Location: ../Login_Folder/login.php");
        exit;
    }
    ?>
  </div>
</body>
</html>
