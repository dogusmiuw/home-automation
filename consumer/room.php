<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plan</title>
  <style>
    .infos {
      background: #b9936c;
      opacity: 0.8;
      display: fixed;
      top: 0;
    }

    .infos h3 {
      margin-bottom: 2rem;
      font-weight: 900;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>

  <?php include("header.php") ?>

  <section id="plans">
    <div class="container">
      <div class="plan">
        <div class="card">
          <div class="inner-plan card-inner">
            <div class="thefront">
              <div class="img-list img-list1"></div>
              <button class="btn btn-primary btn-1">Living room</button>
            </div>
            <div class="theback theback-1">
              <div class="infos">
              <?php
                $sql = "SELECT * FROM `temperature` where `roomId` =1";
                $queryLiving = $db->prepare($sql);
                $queryLiving->execute();
                $temperature = $queryLiving->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>Room temperature - <?php 
                echo $temperature["roomTemp"];
                ?> °C</h3>
                <?php
                $sql = "SELECT * FROM `livingroom` where `livId` =1";
                $queryLiving = $db->prepare($sql);
                $queryLiving->execute();
                $living = $queryLiving->fetch(PDO::FETCH_ASSOC);

                ?>
                <h3>Light - <?php 
                if($living["lightStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
                <h3>Tv - <?php 
                if($living["tvStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
                <h3>Windows - <?php 
                if($living["windowStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="plan">
        <div class="card">
          <div class="inner-plan card-inner">
            <div class="thefront">
              <div class="img-list img-list2"></div>
              <button class="btn btn-primary btn-2">Kitchen</button>
            </div>
            <div class="theback theback-2">
              <div class="back-image back-image-1"></div>
              <div class="infos">
              <?php
                $sql = "SELECT * FROM `temperature` where `roomId` =2";
                $queryKitchen = $db->prepare($sql);
                $queryKitchen->execute();
                $temperature = $queryKitchen->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>Room temperature - <?php 
                echo $temperature["roomTemp"];
                ?> °C</h3>
                <?php
                $sql = "SELECT * FROM `kitchen` where `kitchenId` =1";
                $queryKitchen = $db->prepare($sql);
                $queryKitchen->execute();
                $kitchen = $queryKitchen->fetch(PDO::FETCH_ASSOC);

                ?>
                <h3>Light - <?php 
                if($kitchen["lightStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
                <h3>Windows - <?php 
                if($kitchen["windowStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="plan">
        <div class="card">
          <div class="inner-plan card-inner">
            <div class="thefront">
              <div class="img-list img-list3"></div>
              <button class="btn btn-primary btn-3">Bedroom</button>
            </div>
            <div class="theback theback-3">
              <div class="infos">
              <?php
                $sql = "SELECT * FROM `temperature` where `roomId` =3";
                $queryBedroom = $db->prepare($sql);
                $queryBedroom->execute();
                $temperature = $queryBedroom->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>Room temperature - <?php 
                echo $temperature["roomTemp"];
                ?> °C</h3>
                <?php
                $sql = "SELECT * FROM `bedroom` where `bedroomId` =1";
                $queryBedroom = $db->prepare($sql);
                $queryBedroom->execute();
                $bedroom = $queryBedroom->fetch(PDO::FETCH_ASSOC);

                ?>
                <h3>Light - <?php 
                if($bedroom["lightStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
                <h3>Windows - <?php 
                if($bedroom["windowStatus"]==1){
                  echo "On";
                }
                else{
                  echo "Off";
                  }
                ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>