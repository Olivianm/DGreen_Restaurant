<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css"> <!-- You can link your CSS file here -->
</head>
<body>
    <header>
        <h1>Order Confirmation</h1>
    </header>

    <section class="confirmation">
        <div class="container">
            <h2>Your order has been successfully placed!</h2>
            <p>Thank you for choosing our restaurant.</p>
            <p>Your order will be prepared shortly.</p>
            <!-- You can provide additional details or links here, such as a link to the homepage -->
            <p><a href="../ViewFolder/home.php">Back to Home</a></p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> DGreen Restaurant. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
