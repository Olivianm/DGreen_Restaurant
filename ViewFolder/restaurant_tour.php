<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DGreen Restaurant Gallery & Virtual Tour</title>
  <link rel="stylesheet" href="../CSSFolder/style.css">
  <style>
    .gallery{
        background-color: green;
    }
    .gallery-container{
        display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      width: fit-content;
    }
    img{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        width: 50%;
    }
    body{
        background-color: green;
    }
    .caption{
        color:whitesmoke;
    }
    </style>
</head>
<body>

  <header>
    <h1 style="color: antiquewhite; text-align: center;" >Welcome to DGreen Restaurant</h1>
  </header>
  
  <!-- Gallery Section -->
  <section class="gallery">
    <h2 style="color: antiquewhite;">Gallery</h2>

    <div class="gallery-container">
      <div class="gallery-item">
      <div class="caption" >Dining</div>
        <img src="../images/dining.jpg" alt="Interior Image"><br>
      </div>
      <br>

      <div class="gallery-item">
      <div class="caption">Outside</div>
        <img src="../images/outside.jpg" alt="Exterior Image"><br>
      </div>
      <br>

      <div class="gallery-item">
      <div class="caption">Rooms</div>
        <img src="../images/R2.jpg" alt="Exterior Image">
      </div>

      <div class="gallery-item">
      <div class="caption">Kitchen</div>
        <img src="../images/kitchen.jpg" alt="Exterior Image">
      </div>
     
    </div>
  </section>

  <footer>
    <p>&copy; 2024 DGreen Restaurant. All rights reserved.</p>
  </footer>
</body>
</html>
