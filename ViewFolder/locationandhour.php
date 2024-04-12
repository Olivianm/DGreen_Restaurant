<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Location and Hours</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image:url("../images/R3.jpg")
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: wheat;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: green;
      color:#ccc;
    }

    /* Header styles */
    .header {
      background-color: wheat;
      padding: 10px;
      text-align: center;
      margin-bottom: 20px;
      border-radius: 5px;
    }

    /* Section styles */
    .section {
      margin-bottom: 30px;
    }

    /* Title styles */
    .title {
      font-size: 24px;
      margin-bottom: 10px;
    }

    /* Content styles */
    .content {
      background-color: wheat;
      padding: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
      color:black;
    }

    /* Table styles */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: wheat;
    }
  </style>
</head>
<body>

  <div class="container">
    <header class="header">
      <h1 style="color: black;">Location</h1>
    </header>
    
    <section class="section">
      <h2 class="title">Location Details</h2>
      <div class="content">
        <p>123 Main Street</p>
        <p>City, State, ZIP</p>
        <p>Country</p>
      </div>
    </section>

    <header class="header">
      <h1 style="color: black;">Operating Hours</h1>
    </header>
    <section class="section">
      <h2 class="title">Hours of Operation</h2>
      <div class="content">
        <table>
          <tr>
            <th>Day</th>
            <th>Hours</th>
          </tr>
          <tr>
            <td>Monday - Thursday</td>
            <td>9:00 AM - 9:00 PM</td>
          </tr>
          <tr>
            <td>Friday - Saturday</td>
            <td>9:00 AM - 10:00 PM</td>
          </tr>
          <tr>
            <td>Sunday</td>
            <td>Closed</td>
          </tr>
        </table>
      </div><br>

      <a href="../ViewFolder/home.php" style="color:white;">Go back</a>
    </section>
  </div>

</body>
</html>
