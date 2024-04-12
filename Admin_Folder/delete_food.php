<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Food Item | DGreen Restaurant</title>
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
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    button[type="submit"] {
      background-color: #f44336;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    button[type="submit"]:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Delete Food Item</h2>
    <form id="deleteForm" method="post" action="delete_food.php">
      <label for="food_id">Food ID: </label>
      <input type="number" name="food_id" placeholder="Food ID" required><br>

      <button type="submit">Delete Food</button>
    </form>
    <?php
    // Include the database connection file
    include_once "../Setting_Folder/connection.php";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve food_id from the form
        $food_id = $_POST["food_id"];

        // Delete food from the food_available table
        $deleteQuery = "DELETE FROM food_available WHERE food_id=?";

        // Prepare the delete statement
        $stmt = $conn->prepare($deleteQuery);

        // Bind parameters
        $stmt->bind_param("i", $food_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Food item deleted successfully.</p>";
        } else {
            echo "<p>Error deleting food item: " . $conn->error . "</p>";
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
