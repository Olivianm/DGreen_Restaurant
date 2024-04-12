<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DGreen Restaurant - Online Ordering</title>

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("../images/rooms.jpg");
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

        hr {
            border: 1px solid white;
            margin-bottom: 20px;

        }

        /* Order Form */
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            width: 48%;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Online Ordering Form</h1>
        <hr>

        <form action="./../ViewFolder/order_process.php" method="post">
            <h2>Select Food Items:</h2>

            <?php
            // Include the connection file
            include "../Setting_Folder/connection.php";

            // Fetch food items from the database (assuming table is food_available)
            $sql = "SELECT * FROM food_available";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $foodId = $row['food_id'];
                    $foodName = $row['food_name'];
                    $price = $row['price']; // Assuming price is a numeric value

                    echo "<div class='food-item'>";
                    echo "<input type='checkbox' name='food_items[]' value='$foodId'>";
                    echo "<label for='$foodId'>$foodName - $" . number_format($price, 2) . "</label>";
                    echo "</div>";
                }
            } else {
                echo "No food items available.";
            }

            // Close the database connection
            $conn->close();
            ?>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Delivery Address:</label>
                <textarea name="address" id="address" required></textarea>
            </div>

            <!-- Hidden fields for additional information -->
            <input type="hidden" name="order_date" value="<?php echo date('Y-m-d'); ?>">
            <!-- You can calculate total price dynamically using JavaScript or PHP and pass it here -->
            <input type="hidden" name="total_price" value="0">

            <button class="submit-button" type="submit">Submit Order</button>
        </form>
    </div>
</body>
</html>
