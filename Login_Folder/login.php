<?php
  include "../Action_Folder/login_user_action.php";
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | DGreen Restaurant</title>
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
    <div>
    <h2>Login</h2>
    <form id="loginForm" method="post" action="../ViewFolder/home.php">

      <label for="email">Email: </label><br>
      <input type="email" name="email" placeholder="Email" required><br><br>

      <label for="password">Password: </label><br>
      <input type="password" name="password" placeholder="Password" required><br><br>

      <button type="submit">Login</button>
    </form>

    <?php 
    if (!empty($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
    <p>Don't have an account? <a href="../Login_Folder/register.php">Register here</a></p>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
