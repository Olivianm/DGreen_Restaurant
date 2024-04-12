<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DGreen Restaurant - Order Confirmation</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("../images/R4.jpg");
            background-size: cover;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: wheat;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        h2 {
            text-align: center;
            margin: 10px 0;
        }

        p {
            margin: 10px 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 5px;
        }
        hr{
            border: 1px solid;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the selected food items
            $selectedFoodItems = $_POST["food_items"];

            // Get the customer details
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];

            // Validate and sanitize the inputs
            $name = sanitizeInput($name);
            $email = sanitizeInput($email);
            $phone = sanitizeInput($phone);
            $address = sanitizeInput($address);

            // Validate the selected food items
            if (!empty($selectedFoodItems)) {
                // Process the order
                // Display success message
                echo '<h1>Order Processed Successfully!</h1>';
                echo '<hr> ';
                echo '<p>Thank you, ' . $name . ', for your order.</p>';
                
                echo '<p><strong>Contact Information:</strong></p>';
                echo '<hr> ';
                echo '<p> We will deliver it to the following address:</p>';
                echo '<p><strong>Delivery Address:</strong> ' . $address . '</p>';
                echo '<p><strong>Email:</strong> ' . $email . '</p>';
                echo '<p><strong>Phone:</strong> ' . $phone . '</p>';
                echo '<p><strong>Selected Food Items:</strong></p>';

                // Display the selected food items as a list
                echo '<ul>';
                foreach ($selectedFoodItems as $foodItem) {
                    // Fetch food item details from the database 
                    // Display the food item details
                    echo '<li>' . $foodItem . '</li>';
                }
                echo '</ul>';
            } else {
                // No food items selected
                echo '<h2>No Food Items Selected</h2>';
                echo '<p>Please go back and select at least one food item.</p>';
            }
        } else {
            // Redirect to the online ordering page if accessed directly without form submission
            header("Location: ../Admin_Folder/online_ordering.php");
            exit();
        }
        

        // Function to sanitize input data
        function sanitizeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?><br>

<?php
 include "../Setting_Folder/connection.php";
          
 // Function to insert customer order into the orders table
    function insertOrder($orderDate, $totalPrice)
    {
        // Establish your database connection here
        $conn = mysqli_connect("localhost", "root", "", "DGreen");
    
        // Check if the connection was successful
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    
        // Insert the order into the orders table
        $insertQuery = "INSERT INTO orders (person_id, order_date, total_price) VALUES (?, ?, ?)";
        
        // You'll need to retrieve the person_id from the people table based on the provided name, address, and email.
        // Replace "people" with the actual table name for storing customer details.
        $personIdQuery = "SELECT person_id FROM people WHERE full_name = ? AND address = ? AND email = ?";
    
        // Prepare the person_id query
        $personIdStmt = mysqli_prepare($conn, $personIdQuery);
        mysqli_stmt_bind_param($personIdStmt, "sss", $name, $address, $email);
        mysqli_stmt_execute($personIdStmt);
        mysqli_stmt_bind_result($personIdStmt, $personId);
    
        // Fetch the person_id
        mysqli_stmt_fetch($personIdStmt);
    
        // Prepare the insert query
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "isd", $personId, $orderDate, $totalPrice);

        
        // Execute the insert query
        if (mysqli_stmt_execute($insertStmt)) {
            echo '<p>Order has been successfully inserted into the database.</p>';
        } else {
            echo '<p>Error inserting order into the database: ' . mysqli_error($conn) . '</p>';
        }
    
        // Close the statements and the connection
        mysqli_stmt_close($insertStmt);
        mysqli_stmt_close($personIdStmt);
        mysqli_close($conn);
    }
    
    // Extract the form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orderDate = $_POST["order_date"];
        $totalPrice = $_POST["total_price"];

        $insertQuery = "INSERT INTO orders (person_id, order_date, total_price) VALUES (?, ?, ?)";
    
        // Call the insertOrder function
        insertOrder($orderDate, $totalPrice);

    }
    ?>
        <a href="../ViewFolder/home.php" style="text-align: center; "> <b> Home </b> </a>
    </div>


</body>
</html>