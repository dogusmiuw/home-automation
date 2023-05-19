<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>
  <header>
    <h1 class="heading">Home</h1>
    <div id="menu" class="fas fa-bars"></div>
    <nav class="navbar">
      <ul>
        <li><a href="home.php">home</a></li>
        <li><a href="devices.php">devices</a></li>
        <li><a href="room.php">rooms</a></li>
        <li><a href="about.php">about</a></li>
        <li><a href="contact.php">contact</a></li>
      </ul>
    </nav>
  </header>

  <section class ="column-container">
    <div class="profile-photo-image-wrapper">
      <img class="profile-photo-image" src="/images/dogan.png" alt="">
      <button class = "btn"> Away</button>
    </div>
    
    <div class="profile-photo-image-wrapper">
      <img class="profile-photo-image" src="/images/betul.png" alt="">
      <button class = "btn"> At Home</button>
    </div>
    <div class="profile-photo-image-wrapper">
      <img class="profile-photo-image" src="/images/enes.png" alt="">
      <button class = "btn"> Away</button>
    </div>
  </section>

  


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
