<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Food Item | DGreen Restaurant</title>
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
    <h2>Add Food Item</h2>
    <form id="addForm" method="post" action="add_food.php">
      <label for="food_name">Food Name: </label><br>
      <input type="text" name="food_name" placeholder="Food Name" required><br><br>

      <label for="description">Description: </label><br>
      <textarea name="description" rows="4" placeholder="Description"></textarea><br><br>

      <label for="price">Price: </label><br>
      <input type="number" name="price" step="0.01" placeholder="Price" required><br><br>

      <button type="submit">Add Food</button>
    </form>
    <?php
    // Include the database connection file
    include_once "../Setting_Folder/connection.php";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $food_name = $_POST["food_name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        // Insert data into the food_available table
        $insertQuery = "INSERT INTO food_available (food_name, description, price) 
                        VALUES (?, ?, ?)";
        
        // Prepare the insert statement
        $stmt = $conn->prepare($insertQuery);
        
        // Bind parameters
        $stmt->bind_param("ssd", $food_name, $description, $price);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Food item added successfully.</p>";
        } else {
            echo "<p>Error adding food item: " . $conn->error . "</p>";
        }
        
        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
  </div>
</body>
</html>
