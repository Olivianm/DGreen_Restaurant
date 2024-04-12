<?php
// Include the connection file
include "../Setting_Folder/connection.php";

// Define an array of food items with sanitized data
$food_items = array(
    array(
        'food_name' => htmlspecialchars('Coffee'),
        'description' => htmlspecialchars('Freshly brewed coffee'),
        'price' => 19.99,
    ),
    array(
        'food_name' => htmlspecialchars('Juice'),
        'description' => htmlspecialchars('Refreshing fruit juice'),
        'price' => 14.99,
    ),
    array(
        'food_name' => htmlspecialchars('Pancake'),
        'description' => htmlspecialchars('Fluffy pancakes with syrup'),
        'price' => 12.99,
    ),
    // ... Add details for other food items ...
);

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the INSERT statement with correct placeholders
$sql = "INSERT INTO food_available (food_name, description, price) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql); // Prepare the statement

foreach ($food_items as $item) {
    $food_name = $item['food_name'];
    $description = $item['description'];
    $price = $item['price'];

    // Bind values to placeholders using prepared statement (three variables)
    $stmt->bind_param('sss', $food_name, $description, $price);

    if ($stmt->execute() === TRUE) {
        echo "New food item '<b>$food_name</b>' added successfully!<br>";
    } else {
        echo "Error: (" . $stmt->errno . ") " . $stmt->error . "<br>";
    }

    // Reset the prepared statement for the next iteration
    $stmt->reset();
}

$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection
?>
