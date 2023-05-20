<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plan</title>
    <style>
      html {
        height: 130vh;
      }
      * {
        scroll-behavior: none;
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <header>
     
      <div id="menu" class="fas fa-bars"></div>
      <nav class="navbar">
        <ul>
          <li><a href="home.php">home</a></li>
          <li><a href="devices.php">devices</a></li>
          <li><a href="room.php">rooms</a></li>
          <li><a href="contact.php">contact</a></li>
          <li><a href="about.php">about</a></li>
        </ul>
      </nav>
    </header>

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
                <a href="devices.php#liv">
                  <button
                    class="btn"
                    style="font-size: 2.8rem; padding: 0.7rem 3.7rem"
                  >
                    Device Settings
                  </button></a
                >
                <a href="devices.php#liv">
                  <div class="back-image back-image-1"></div>
                  <button
                    class="btn"
                    style="font-size: 3rem; padding: 0.7rem 5rem"
                  >
                    Add Devices
                  </button></a
                >
                <a href="devices.php#liv">
                  <button class="btn" style="font-size: 2.8rem">
                    Remove Devices
                  </button></a
                >
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
                <a href="devices.php#kit">
                  <button
                    class="btn"
                    style="font-size: 2.8rem; padding: 0.7rem 3.7rem"
                  >
                    Device Settings
                  </button></a
                >
                <a href="devices.php#kit">
                  <button
                    class="btn"
                    style="font-size: 3rem; padding: 0.7rem 5rem"
                  >
                    Add Devices
                  </button></a
                >
                <a href="devices.php#kit">
                  <button class="btn" style="font-size: 2.8rem">
                    Remove Devices
                  </button></a
                >
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
                <a href="devices.php#bed">
                  <button
                    class="btn"
                    style="font-size: 2.8rem; padding: 0.7rem 3.7rem"
                  >
                    Device Settings
                  </button></a
                >
                <a href="devices.php#bed">
                  <button
                    class="btn"
                    style="font-size: 3rem; padding: 0.7rem 5rem"
                  >
                    Add Devices
                  </button></a
                >
                <a href="devices.php#bed">
                  <button class="btn" style="font-size: 2.8rem">
                    Remove Devices
                  </button></a
                >
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
