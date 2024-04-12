<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us | DGreen Restaurant</title>
<style>
/* CSS styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
  background-image: url("../images/resta.jpeg");
}

.container {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
  background-color: wheat;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: black;
}

p {
  line-height: 1.6;
  color: black;
}

#toggle-button {
  cursor: pointer;
  color: #007bff;
  text-decoration: underline;
}
</style>
</head>
<body>

<div class="container">

<a href="../ViewFolder/home.php">Go Back</a>
  <h1>About Us</h1>
  <p>Welcome to DGreen Restaurant! </p>
  <p>We are dedicated to providing you with the finest dining experience, 
    offering delicious and freshly prepared meals in a cozy and welcoming atmosphere.</p>
  <p>Our chefs are passionate about using only the highest quality ingredients sourced from local farmers and suppliers. 
    From succulent steaks to delicate seafood dishes, our menu has something to satisfy every palate.</p>

  <p>At DGreen Restaurant, we believe in sustainability and environmental responsibility.
     That's why we strive to minimize our carbon footprint by implementing eco-friendly practices in our operations.</p>
  <p>Join us for a memorable dining experience and taste the difference at DGreen Restaurant!</p>
  <p id="more-info" style="display: none;">For reservations or inquiries, please contact us at <a href="tel:+23353456789">+233-534-567-89</a> or email us at <a href="mailto:info@dgreenrestaurant.com">info@dgreenrestaurant.com</a>.</p>
  <p id="toggle-button" onclick="toggleInfo()">Show More Info</p>
</div>

<script>
// JavaScript for toggling additional information
function toggleInfo() {
  var moreInfo = document.getElementById("more-info");
  var toggleButton = document.getElementById("toggle-button");

  if (moreInfo.style.display === "none") {
    moreInfo.style.display = "block";
    toggleButton.textContent = "Hide More Info";
  } else {
    moreInfo.style.display = "none";
    toggleButton.textContent = "Show More Info";
  }
}
</script>



</body>
</html>
