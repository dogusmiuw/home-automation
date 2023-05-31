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
   
  <?php include("header.php") ?>
  <body>
    <section class="roomselector">
      <div class="menu-container">
        <div class="menu-btns">
          <button type="button" class="menu-btn active-btn" id="livingroom">
            living Room
          </button>
          <button type="button" class="menu-btn" id="kitchen">Kitchen</button>
          <button type="button" class="menu-btn" id="bedroom">Bedroom</button>
        </div>
      </div>
    </section>
    <section class="rooms" style="padding-top: 0">
      <div class="livingroom room-item" id="">
        <h1 class="title" id="titleLiv">Devices</h1>
        <div class="coloumns">
        <?php include("graph.php") ?>
          <div id="cr"></div>
          </div>
          
    </section> 

        </div>
      </div>
      <div class="kitchen room-item">
        <h1 class="title">Kitchen</h1>
        <div class="coloumns"></div>
      </div>
      <div class="bedroom room-item" style="margin-bottom: 20rem">
        <h1 class="title">Bedroom</h1>
        <div class="coloumns"></div>
      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
        
    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("cr", {
  height: 400,
  width: 1200,
	animationEnabled: true,
	exportEnabled: true,
  backgroundColor:"#e0d6cc",
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "yarragim"
	},
	data: [{
    
		type: "column", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
    <script src="js/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  </body>
  </html>
  