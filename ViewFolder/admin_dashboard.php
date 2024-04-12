<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | DGreen Restaurant</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      background-image: url("../images/rooms.jpg");
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
    hr{
        border: 2px solid;
    }
  </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <hr>
        <div class="admin-section">
            <h3>MANAGER USER</h3>
            <ul>
                <li><a href="../Admin_Folder/add_user_management.php">Add User</a></li>
                <li><a href="../Admin_Folder/delete_user">Delete User</a></li>
                <li><a href="../Admin_Folder/edit_user.php">Update User</a></li>
            </ul>
        </div>

        <div class="admin-section">
            <h3>MANAGER FOOD AVAILABLE</h3>
            <ul>
                <li><a href="../Admin_Folder/add_food.php">Add Food</a></li>
                <li><a href="../Admin_Folder/delete_food.php">Delete Food</a></li>
                <li><a href="../Admin_Folder/update_food.php">Update Food</a></li>
            </ul><br>

            <h3>ACTIVITIES</h3>
    <table>
      <tr>
        <th>Activity Type</th>
        <th>Person ID</th>
        <th>Date</th>
        <th>Time / Details</th>
      </tr>
        </div>
        
    </div>
    
      <?php

   
      // Start the session
      session_start();

      // Include the database connection file
      include_once "../Setting_Folder/connection.php";

      // Retrieve person_id from the session
      $personId = isset($_SESSION['person_id']) ? $_SESSION['person_id'] : '';

      // Fetch activities for the logged-in user from the database
      $activitySql = "SELECT 'Reservation' AS activity_type, reservation_id AS id, reservation_date AS activity_date, reservation_time AS activity_time, num_guests AS details
                      FROM reservations
                      WHERE person_id = ?
                      UNION ALL
                      SELECT 'Order' AS activity_type, order_id AS id, order_date AS activity_date, '' AS activity_time, total_price AS details
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

      // Display activities
      if ($activityResult->num_rows > 0) {
        while ($activityRow = $activityResult->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $activityRow["activity_type"] . "</td>";
          echo "<td>" . $activityRow["id"] . "</td>";
          echo "<td>" . $activityRow["activity_date"] . "</td>";
          echo "<td>" . $activityRow["activity_time"] . " " . $activityRow["details"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No activities found.</td></tr>";
      }

      // Close the prepared statement
      $stmt->close();

      // Close the database connection
      $conn->close();
      ?>
    </table>
    <br>

    <footer>
        <a href= "../Admin_Folder/admin_login"> <b>Logout </b></a>
    </footer>
  </div>
</body>
</html>
