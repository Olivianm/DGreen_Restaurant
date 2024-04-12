<?php
// Include the database connection file
include_once "../Setting_Folder/connection.php";

// Retrieve reservation data from the database
$sql = "SELECT * FROM reservations";
$result = mysqli_query($conn, $sql);

// Check if there are reservations
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table>";
    echo "<tr><th>Reservation ID</th><th>Date</th><th>Time</th><th>Number of Guests</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["reservation_id"] . "</td>";
        echo "<td>" . $row["reservation_date"] . "</td>";
        echo "<td>" . $row["reservation_time"] . "</td>";
        echo "<td>" . $row["num_guests"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No reservations found.";
}

// Close the database connection
mysqli_close($conn);
?>
