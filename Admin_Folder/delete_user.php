<?php
// Include the database connection file
include_once "../Setting_Folder/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve person_id from the form
    $person_id = $_POST["person_id"];

    // Delete user from the people table
    $deleteQuery = "DELETE FROM people WHERE person_id=?";
    
    // Prepare the delete statement
    $stmt = $conn->prepare($deleteQuery);
    
    // Bind parameters
    $stmt->bind_param("i", $person_id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete User | DGreen Restaurant</title>
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
    <h2>Delete User</h2>
    <form id="deleteForm" method="post" action="">
      <label for="person_id">User ID: </label><br>
      <input type="number" name="person_id" placeholder="User ID" required><br><br>

      <button type="submit">Delete User</button>
    </form>

    <?php 
    if (!empty($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
  </div>
  <script src="script.js"></script>
</body>
</html>
