<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to DGreen Restaurant</title>
  <link rel="stylesheet" href="style.css">
  <style>

    /* Horizontal navigation */
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    nav ul li {
      padding: 8px 16px;
    }

    /* Adjustments for responsiveness */
    @media screen and (max-width: 900px) {
      nav ul {
        flex-direction: column; 
      }
    }
    a:hover {
      background-color: gray;
    }
    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size:20px;
      border-radius: 20px;
    }
        .container{
      background-color: #f1f1f1;
      width: 1200px;
      margin: 10px auto;
      font-size: 15px;
      text-align: center;
      color: #f1f1f1;
      align-items: center;
      overflow: hidden;
      background-color: darkgreen;
    }

    .menu-items {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .menu-item {
      width: 30%;
      margin-bottom: 20px;
    }

    .menu-item img {
      width: 100%;
    }
    hr{
      border:1px solid whitesmoke;
    }
    img{
      content: inherit;
    }
    
  </style>
</head>
<body>

<header style="height: 25%;">
    <div class="container">
        <nav>
            <h1 style="align-items: center; "> DGreen Restaurant </h1>
            <ul>
                <li><a href="../ViewFolder/dashboard.php" style="color: #f1f1f1;">Dashboard</a></li>
                <li><a href="../ViewFolder/menu.php" style="color: #f1f1f1;">Menu</a></li>
                <li><a href="../ViewFolder/about.php" style="color: #f1f1f1;">About Us</a></li>
                <li><a href="../ViewFolder/contact.php" style="color: #f1f1f1;">Contact</a></li>
                <li><a href="../ViewFolder/locationandhour.php" style="color: #f1f1f1;">Location</a></li>
                <li><a href="../ViewFolder/process_reservation.php" style="color: #f1f1f1;">Reservation</a></li>
                <li><a href="../Admin_Folder/user_profile.php" style="color: #f1f1f1;"></a></li>
                <li><a href="../Login_Folder/logout.php" style="color: #f1f1f1;">Logout</a></li>
                <li>
                    <div style="color: #f1f1f1;">
                        <?php
                        // Start or resume the session
                        session_start();

                        // Check if the user is logged in
                        if (isset($_SESSION['full_name'])) {
                            // Display user's full name
                            echo "Welcome, " . $_SESSION['full_name'];
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </nav>

    </div>
</header>



  <section class="features">
    <div class="container">
      <div class="feature">
        <img src="../images/res.jpg" alt="Chef" style="width: 70%;">
        
      <h3>The green welcomes the nature, Enjoy!</h3>
        <h3>Expert Chefs</h3>
        <p>Our dishes are crafted by expert chefs using the finest ingredients.</p>
      </div>
      
      <div class="feature">
        <img src="./../images/dining.jpg" alt="Ambience" style="width: 70%; height:50%;">
        <h3>Relaxing Ambience</h3>
        <p>Enjoy your meal in a cozy and relaxing atmosphere.</p>
      </div>

    </div>
  </section>
    
  

  <section class="hero">
    <div class="container">
      <h2 style="text-align: center">Delicious Food &amp; Great Ambience</h2>
      <p>Experience the finest dining experience at DGreen Restaurant.</p>
    </div>

  </section>
  
  <footer>
    <div class="container">
      <p>&copy; 2024 DGreen Restaurant. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
