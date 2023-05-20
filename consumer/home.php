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
  <link rel="stylesheet" href="css/music.css">
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
  <div class="plan plays">
      <div id="app-cover">
        <div id="bg-artwork"></div>
        <div id="bg-layer"></div>
        <div id="player">
          <div id="player-track">
            <div id="album-name"></div>
            <div id="track-name"></div>
            <div id="track-time">
              <div id="current-time"></div>
              <div id="track-length"></div>
            </div>
            <div id="s-area">
              <div id="ins-time"></div>
              <div id="s-hover"></div>
              <div id="seek-bar"></div>
            </div>
          </div>
          <div id="player-content">
            <div id="album-art">
              <img src="images/kader.jpg" class="active" id="_1" />
              <img
                src=""
                id="_2"
              />
              <img
                src=""
                id="_3"
              />
              <img
                src=""
                id="_4"
              />
              <img
                src=""
                id="_5"
              />
              <div id="buffer-box">Buffering ...</div>
            </div>
            <div id="player-controls">
              <div class="control">
                <div class="buttond" id="play-previous">
                  <i class="fas fa-backward"></i>
                </div>
              </div>
              <div class="control">
                <div class="buttond" id="play-pause-button">
                  <i class="fas fa-play"></i>
                </div>
              </div>
              <div class="control">
                <div class="buttond" id="play-next">
                  <i class="fas fa-forward"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/music.js"></script>
  </body>
</html>
