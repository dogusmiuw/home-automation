<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <style>
      body {
        height: 100vh;
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/music.css" />
    <link rel="stylesheet" href="css/weather.css" />
    <link rel="stylesheet" href="css/switch.css" />
  </head>
  <body>
      <?php include("header.php") ?>
    <div class="coloumnss">
      <div class="columnss1">
        <section class="clockk">
          <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        </section>
        <section class="column-container">

          
          <?php 
$sql = "SELECT * FROM `memberdistance`";
$distance = $db->prepare($sql);
$distance->execute();
$distances = $distance->fetchAll(PDO::FETCH_ASSOC);

foreach ($distances as $dist) {
    // Process each member's data here
    if ($dist["memberId"] == 1) {
      echo '<div class="profile-photo-image-wrapper">';
        echo '<img src="images/dogan.png" alt="profile-photo" class="profile-photo-image">';
        
        if ($dist["memberStatus"] == 0) {
            echo '<button class="scn-btn">Away</button>';
            echo '</div>'; 
            
        } else {
            echo '<button class="scn-btn">At Home</button>';
            echo '</div>'; 
        }
        
    } else if ($dist["memberId"] == 2) {
      echo '<div class="profile-photo-image-wrapper">';
        echo '<img src="images/betul.png" alt="profile-photo" class="profile-photo-image">';
        
        if ($dist["memberStatus"] == 0) {
            echo '<button class="scn-btn">Away</button>';
            echo '</div>'; 
        } else {
            echo '<button class="scn-btn">At Home</button>';
            echo '</div>'; 
        }
    }
    else if ($dist["memberId"] == 3) {
      echo '<div class="profile-photo-image-wrapper">';
      echo '<img src="images/enes.png" alt="profile-photo" class="profile-photo-image">';
      
      if ($dist["memberStatus"] == 0) {
          echo '<button class="scn-btn">Away</button>';
          echo '</div>'; 
      } else {
          echo '<button class="scn-btn">At Home</button>';
          echo '</div>'; 
      }
  }
    // Add more conditions for other memberIds if needed
}
?>

            


        </section>
        <div class="weatherr">
          <section class="cardd" data-weather="card">
            <div class="body">
              <div class="temperature">
                <figure class="icon">
                  <img src="" alt="" data-weather="icon" />
                </figure>
                <div class="content" data-weather="temperature">
                  <div class="is-fahrenheit is-hidden">
                    <span class="value" data-weather="fahrenheit"></span>
                    <span>F</span>
                  </div>
                  <div class="is-celsius">
                    <span class="value" data-weather="celsius"></span>
                    <span class="scale">C</span>
                  </div>
                </div>
                <div class="actions">
                  <button
                    class="button is-active"
                    data-weather-action="show-celcius"
                  >
                    °C
                  </button>
                  <button class="button" data-weather-action="show-fahrenheit">
                    °F
                  </button>
                </div>
              </div>
            </div>
            <footer class="footer">
              <div class="weather">
                <h3 class="city" data-weather="local">...</h3>
                <p class="clime" data-weather="clime">...</p>
              </div>
            </footer>
          </section>
        </div>
      </div>
      <div class="columnss2">
        <div class="welcomes">
          <h3>Welcome home</h3>
        </div>
        <?php 
       $sql = "SELECT * FROM `livingroom` where `livId` =1";
        $queryLiving = $db->prepare($sql);
        $queryLiving->execute();
        $living = $queryLiving->fetch(PDO::FETCH_ASSOC);
       
        ?>
        <div onload="onpageload()" class="switches">
          <div id="wrap" class="switchess">
            <fieldset class="switchess1">
              <h2 style="left: 50px">Smart Switch!</h2>
              <div class="center center1">
                <h1>Living Room</h1>
                <input
                  onClick="s1()"
                  onchange="lightUpdate()"
                  type="checkbox"
                  name="checkbox1"
                  id="checkbox1"
                  <?php 
                  if($living["lightStatus"]==1){
                    echo "checked";
                    
                  }else{
                    echo "";
                  }
                  ?>
                /> 
                <br />
                <h1>Bedroom</h1>
                <input
                  onClick="s2()"
                  type="checkbox"
                  name="checkbox2"
                  id="checkbox2"
                />
                <br />
                <h1>Kitchen</h1>
                <input
                  onClick="s3()"
                  type="checkbox"
                  name="checkbox3"
                  id="checkbox3"
                />
                <br />
                <h1>FAN</h1>
                <input
                  onClick="fan()"
                  type="checkbox"
                  name="checkbox5"
                  id="checkbox5"
                />
              </div>
            </fieldset>
          </div>
        </div>
        <div onload="onpageload()" class="switches2">
          <fieldset class="switchess2">
            <h2 style="left: 95px; top: -50px">Fan Speed!</h2>
            <input type="radio" id="radio1-1" onClick="s5(25)" name="radio" />
            <label for="radio1-1">1</label>
            <input type="radio" id="radio1-2" onClick="s5(35)" name="radio" />
            <label for="radio1-2">2</label>
            <input type="radio" id="radio1-3" onClick="s5(55)" name="radio" />
            <label for="radio1-3">3</label>
            <input type="radio" id="radio1-4" onClick="s5(75)" name="radio" />
            <label for="radio1-4">4</label>
            <input type="radio" id="radio1-5" onClick="s5(90)" name="radio" />
            <label for="radio1-5">5</label>
          </fieldset>
        </div>
        <div onload="onpageload()" class="switches3">
          <fieldset class="switchess3">
            <h2 style="top: -50px">The Super Switch!</h2>
            <a onClick="s6()" class="superBtn">ON/OFF All Switch</a>
          </fieldset>
        </div>
      </div>
      <div class="columnss3">
        <div class="warnings">
          <div class="notification green">
            <div class="info">
              <h1>
                Your electricity consumption is 1 kWh less than last month.
              </h1>
            </div>
            <div class="icon">
              <i class="fa-solid fa-check"></i>
            </div>
          </div>
        </div>
        <div class="warnings">
          <div class="notification red">
            <div class="info">
              <h1>Ben Doğan geliyorum</h1>
            </div>
            <div class="icon">
              <i
                class="fa-solid fa-circle-xmark fa-beat"
                style="color: #ffffff"
              ></i>
            </div>
          </div>
        </div>
        <div class="warnings">
          <div class="notification blue">
            <div class="info">
              <h1>preview is here</h1>
            </div>
            <div class="icon">
              <i class="fa-solid fa-triangle-exclamation fa-flip"></i>
            </div>
          </div>
        </div>
        <div class="warnings">
          <div class="notification purple">
            <div class="info">
              <h1><a>8 min</a> to home with a bicycle</h1>
            </div>
            <div class="icon">
              <i class="fa-regular fa-bell fa-shake"></i>
            </div>
          </div>
        </div>
        <div class="enterance">
          <h4>Home check-in Time</h4>
          <div class="person firstP">
            <i
              class="fa-sharp fa-solid fa-person-walking"
              style="display: inline"
            ></i>
            <p>Doğan has arrived</p>
            <p class="time">25 min</p>
          </div>
          <div class="person secondP">
            <i
              class="fa-sharp fa-solid fa-person-walking"
              style="display: inline"
            ></i>
            <p>Betül has left</p>
            <p class="time">55 min</p>
          </div>
          <div class="person thirdP">
            <i
              class="fa-sharp fa-solid fa-person-walking"
              style="display: inline"
            ></i>
            <p>Enes has has</p>
            <p class="time">15 days</p>
          </div>
          <div class="person fourthP">
            <i
              class="fa-sharp fa-solid fa-person-walking"
              style="display: inline"
            ></i>
            <p>Şerzan has</p>
            <p class="time">3 months</p>
          </div>
        </div>
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
                  <img src="" id="_2" />
                  <img src="" id="_3" />
                  <img src="" id="_4" />
                  <img src="" id="_5" />
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
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/7a022ccbad.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/music.js"></script>
    <script src="js/babel.js"></script>
    <script src="js/clock.js"></script>
    <script src="js/switch.js"></script>
    <script>
    function lightUpdate(){
      <?php 
        $sql = "SELECT * FROM `livingroom` where `livId` =1";
        $queryLiving = $db->prepare($sql);
        $queryLiving->execute();
        $living = $queryLiving->fetch(PDO::FETCH_ASSOC);
        if($living['lightStatus'] == 1){
          $newLightStatus = 0;
                    $livId = 1;
                    $handle = $db->prepare('UPDATE livingroom SET lightStatus = :newLightStatus WHERE livId = :livId');
                    $handle->bindParam(':newLightStatus', $newLightStatus);
                    $handle->bindParam(':livId', $livId);
                    $handle->execute();
                    $db = null;
        }
        else{
          $newLightStatus = 1;
                    $livId = 1;
                    $handle = $db->prepare('UPDATE livingroom SET lightStatus = :newLightStatus WHERE livId = :livId');
                    $handle->bindParam(':newLightStatus', $newLightStatus);
                    $handle->bindParam(':livId', $livId);
                    $handle->execute();
                    $db = null;
        }
        
        

        ?>
    }
    </script>
  </body>
</html>
