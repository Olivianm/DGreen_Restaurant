<?php
// Start the session
session_start();

// Include the database connection file
include_once "../Setting_Folder/connection.php";

// Retrieve the person_id of the logged-in user from the session
//$personId = $_SESSION['person_id'];

// Fetch activities for the logged-in user from the database
$activitySql = "SELECT 'Reservation' AS activity_type, reservation_id AS id, reservation_date AS activity_date, reservation_time AS activity_time, num_guests AS details, NULL AS full_name
                FROM reservations
                WHERE person_id = ?
                UNION ALL
                SELECT 'Order' AS activity_type, order_id AS id, order_date AS activity_date, '' AS activity_time, total_price AS details, NULL AS full_name
                FROM orders
                WHERE person_id = ?
                ORDER BY activity_date DESC";

// Prepare the query
$stmt = $conn->prepare($activitySql);

// Bind parameters
$stmt->bind_param("ii", $personId, $personId);

// Execute the query
$stmt->execute();

// Get the result
$activityResult = $stmt->get_result();

// Check if any activities are found
if ($activityResult->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard | DGreen Restaurant</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f1f1f1;
                background-image: url("../images/R5");
            }

            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 50px;
                background-color: wheat;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 30px;
            }

            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h2>Dashboard</h2>

        <h3>Activities</h3>
        <table>
            <tr>
                <th>Full Name </th>
                <th>Activity Type</th>
                <th>Activity ID</th>
                <th>Date</th>
                <th>Time / Details</th>
            </tr>
            <?php while ($activityRow = $activityResult->fetch_assoc()) { ?>
                <tr>
                    <td><?= $activityRow["full_name"] ?></td>
                    <td><?= $activityRow["activity_type"] ?></td>
                    <td><?= $activityRow["id"] ?></td>
                    <td><?= $activityRow["activity_date"] ?></td>
                    <td><?= $activityRow["activity_time"] ?> <?= $activityRow["details"] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    </body>
    </html>
    <?php
} else {
    // If no activities are found, display a message
    echo "No activities found.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
