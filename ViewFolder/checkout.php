<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>Checkout</h1>
  </header>
  
  <section class="checkout">
    <h2>Order Summary</h2>
    <!-- Display order details such as items, quantities, and total price -->
    <ul>
      <li>Item 1 - $10.00</li>
      <li>Item 2 - $15.00</li>
      <!-- Add more list items for each item in the order -->
    </ul>
    <p>Total: $25.00</p>
    <form action="process_payment.php" method="post">
      <label for="card">Credit Card Number:</label>
      <input type="text" id="card" name="card" required>
      <label for="expiry">Expiration Date:</label>
      <input type="text" id="expiry" name="expiry" required>
      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv" required>
      <button type="submit">Proceed to Payment</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2024 DGreen Restaurant. All rights reserved.</p>
  </footer>
</body>
</html>
