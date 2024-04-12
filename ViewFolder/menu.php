<?php
// Include the connection file
include "../Setting_Folder/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DGreen Restaurant</title>

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

   
    </style>
</head>
<body>
    </div>
</section>
    


    <script>
    function goToHomePage() {
    window.location.href = "../ViewFolder/home.php"; 
    }
    </script>
<section class="menu">
    <div class="container">
      <h1 style="font-size:30px;">Check out Our Available  Menu</h1><br>
      <hr style="width: 25%;">
      <a style="color: #f1f1f1; font-size:20px; " href="../Admin_Folder/online_ordering.php?item_id=1"> <b> Click to order </b></a>
      <hr style="width: 25%;">
<!--Back arrow-->
<div > 
    <button class="back-arrow" onclick="goToHomePage()"> Go Back</button>
</div>
      <h2>Breakfast</h2>
      <hr>
      <div class="menu-items">
        <div class="menu-item">
          <h3>Coffee</h3>
          <img src="../images/Breakfast/coffee.jpg" alt="Coffee">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Juice</h3>
          <img src="../images/Breakfast/juice.jpg" alt="Juice">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Pancake</h3>
          <img src="../images/Breakfast/pancake.jpg" alt="Pancake">
          <span class="price">$19.99</span> <br>
        </div>
      </div>

      <h2>Lunch</h2>
      <hr>
      <div class="menu-items">
        <div class="menu-item">
          <h3>Chicken Wings</h3>
          <img src="../images/Lunch/chickenwings.jpg" alt="Chicken Wings">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Soup</h3>
          <img src="../images/Lunch/soup.jpg" alt="Soup">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Spaghetti</h3>
          <img src="../images/Lunch/spaghetti.jpg" alt="Spaghetti">
          <span class="price">$19.99</span> <br>
        </div>
      </div>

      <h2>Dinner</h2>
      <hr>
      <div class="menu-items">
        <div class="menu-item">
          <h3>French Fries</h3>
          <img src="../images/Dinner/frenchfries.jpg" alt="French Fries">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Jollof Rice</h3>
          <img src="../images/Dinner/jollofrice.jpg" alt="Jollof Rice">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Ugali and Fish</h3>
          <img src="../images/Dinner/ugaliandfish.jpg" alt="Ugali and Fish">
          <span class="price">$19.99</span> <br>
        </div>
      </div>

      <h1>Dessert</h1>
      <hr>
      <div class="menu-items">
        <div class="menu-item">
          <h3>Dessert</h3>
          <img src="../images/Lunch/dessert.jpg" alt="Dessert">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Dessert</h3>
          <img src="../images/Lunch/dessert2.jpg" alt="Dessert">
          <span class="price">$19.99</span> <br>
        </div>

        <div class="menu-item">
          <h3>Dessert</h3>
          <img src="../images/Lunch/dessert3.jpg" alt="Dessert">
          <span class="price">$19.99</span> <br>
        </div>

      </div>
    </div>
  </section>
  
  <footer>
    <div class="container">
      <p>&copy; 2024 DGreen Restaurant. All rights reserved.</p>
    </div>
  </footer>
  
</body>
</html>