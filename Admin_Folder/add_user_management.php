<?php
// Include the database connection file
include_once "../Setting_Folder/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];

    // Insert data into the people table
    $insertQuery = "INSERT INTO people (full_name, email, phone_number, address, gender, password) 
                    VALUES (?, ?, ?, ?, ?, ?)";
    
    // Prepare the insert statement
    $stmt = $conn->prepare($insertQuery);
    
    // Bind parameters
    $stmt->bind_param("ssssss", $full_name, $email, $phone_number, $address, $gender, $password);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error adding user: " . $conn->error;
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
  <title>Admin User Management</title>
  <link rel="stylesheet" href="style.css">

  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f1f1f1;
}

.container {
  width: 50%;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

</style>
</head>
<body>
  <div class="container">
    <h2>Add User</h2>
    <form id="addUserForm" method="post" action="add_user.php">
      <label for="full_name">Full Name:</label><br>
      <input type="text" name="full_name" required><br><br>

      <label for="email">Email:</label><br>
      <input type="email" name="email" required><br><br>

      <label for="phone_number">Phone Number:</label><br>
      <input type="tel" name="phone_number"><br><br>

      <label for="address">Address:</label><br>
      <input type="text" name="address"><br><br>

      <label for="gender">Gender:</label><br>
      <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select><br><br>

      <label for="password">Password:</label><br>
      <input type="password" name="password" required><br><br>

      <button type="submit">Add User</button>
    </form>
  </div>
</body>
</html>
