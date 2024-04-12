<?php
// Start or resume the session
session_start();

// Check if the cart session variable exists and is not empty
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Include the database connection file
    include "../Setting_Folder/connection.php";

    // Retrieve customer information from the session (you may need to adjust this based on your registration process)
    $customerId = $_SESSION['customer_id']; // Assuming you have a session variable storing the customer ID
    $customerEmail = $_SESSION['customer_email']; // Assuming you have a session variable storing the customer email

    // Insert order into the database
    $sql = "INSERT INTO orders (person_id, order_date, total_price) VALUES (?, NOW(), ?)";
    $stmt = $conn->prepare($sql);
    $totalPrice = 0;
    foreach($_SESSION['cart'] as $item) {
        $totalPrice += $item['price'];
    }
    $stmt->bind_param("id", $customerId, $totalPrice);
    $stmt->execute();
    $orderId = $stmt->insert_id; // Get the ID of the inserted order

    // Insert order items into the database
    $sql = "INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    foreach($_SESSION['cart'] as $item) {
        $stmt->bind_param("iiid", $orderId, $item['food_id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }

    // Clear the cart session variable after the order is placed
    unset($_SESSION['cart']);

    // Close the database connection
    $conn->close();

    // Redirect the user to a confirmation page
    header("Location: ../ViewFolder/confirmation.php");
    exit();
} else {
    // If the cart is empty, redirect the user to the menu page
    header("Location: ../ViewFolder/menu.php");
    exit();
}
?>
