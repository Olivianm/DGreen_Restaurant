<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout | DGreen Restaurant</title>
</head>
<body>
  <div class="container">
    <p>You have been successfully logged out!</p>
  </div>

  <script>
    // Function to handle logout and redirect to login page
    function logout() {
      // Redirect to the login page
      window.location.href = "../Login_Folder/login.php";
    }
    window.onload = function() {
  logout(); // This will call the logout function when the page loads
}

  </script>
</body>
</html>
