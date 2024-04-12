<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation | DGreen Restaurant</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      background-image: url("../images/outside.jpeg");
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 50px;
      background-color: wheat;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    form {
      margin-top: 30px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="date"],
    input[type="time"],
    input[type="number"],
    input[type="hidden"],
    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .success-message {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
      color: green;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Reservation Form</h2>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="person_id" value="1"> 

      <label for="reservation_date">Reservation Date:</label>
      <input type="date" name="reservation_date" required>

      <label for="reservation_time">Reservation Time:</label>
      <input type="time" name="reservation_time" required>

      <label for="num_guests">Number of Guests:</label>
      <input type="number" name="num_guests" required>

      <button type="submit">Submit Reservation</button>
    </form>

    <a href="../ViewFolder/home.php">Go to Menu</a>
  </div>


  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include_once "../Setting_Folder/connection.php";

    // Retrieve form data
    $personId = $_POST["person_id"];
    $reservationDate = $_POST["reservation_date"]; 
    $reservationTime = $_POST["reservation_time"]; 
    $numGuests = $_POST["num_guests"];

    // Prepare SQL statement to insert data into the `reservations` table
    $sql = "INSERT INTO reservations (person_id, reservation_date, reservation_time, num_guests) 
            VALUES ('$personId', '$reservationDate', '$reservationTime', '$numGuests')";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        // Close the database connection
        mysqli_close($conn);

        // Redirect to the home page
        header("Location: ../ViewFolder/home.php");
        exit();
    } else {
        // Handle database insertion error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
</body>
</html>
