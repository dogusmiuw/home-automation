<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <style>
      body{
        height: 100vh;
      }
      .canvasjs-chart-canvas{
        margin-top: 5rem;
        margin-right: 5rem;
      }
      #chartContainer1 {
        margin-right: 5rem;
        margin-left: 3rem;
      }
      #chartContainer2{
        margin-left: 3rem;
      }
      #chartContainer3 {
        margin-top: 15rem;
        margin-bottom: 30rem;
      }
      #chartContainer4 {
        margin-top: 15rem;
        margin-bottom: 10rem;
      }
      #chartContainer5 {
        margin-right: 5rem;
        margin-left: 3rem;
      }
      #chartContainer6{
        margin-left: 3rem;
      }
      #chartContainer7 {
        margin-top: 15rem;
        margin-bottom: 30rem;
      }
      #chartContainer8 {
        margin-top: 15rem;
        margin-bottom: 10rem;
      }
      #chartContainer9 {
        margin-right: 5rem;
        margin-left: 3rem;
      }
      #chartContainer10{
        margin-left: 3rem;
      }
      #chartContainer11 {
        margin-top: 15rem;
        margin-bottom: 10rem;
      }
      #chartContainer12 {
        margin-top: 15rem;
        margin-bottom: 10rem;
      }
    </style>
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
  <?php include("header.php") ?>
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
        <h1 class="title" id="titleLiv">detailed analyzes for living room</h1>
        <div class="coloumns">
          <div id="chartContainer1" style="width: 45%; height: 300px;display: inline-block;"><?php include("graph.php") ?></div> 
          <div id="chartContainer2" style="width: 45%; height: 300px;display: inline-block;"></div><br/>
          <div id="chartContainer3" style="width: 45%; height: 300px;display: inline-block;"></div>
          <div id="chartContainer4" style="width: 45%; height: 300px;display: inline-block;"></div>
        </div>
      </div>
      <div class="kitchen room-item">
        <h1 class="title">detailed analyzes for kitchen</h1>
        <div class="coloumns">
          <div id="chartContainer5" style="width: 45%; height: 300px;display: inline-block;"><?php include("graph.php") ?></div> 
          <div id="chartContainer6" style="width: 45%; height: 300px;display: inline-block;"></div><br/>
          <div id="chartContainer7" style="width: 45%; height: 300px;display: inline-block;"></div>
          <div id="chartContainer8" style="width: 45%; height: 300px;display: inline-block;"></div>
        </div>
      </div>
      <div class="bedroom room-item" style="margin-bottom: 20rem">
        <h1 class="title">detailed analyzes for bedroom</h1>
        <div class="coloumns">
          <div id="chartContainer9" style="width: 45%; height: 300px;display: inline-block;"><?php include("graph.php") ?></div> 
          <div id="chartContainer10" style="width: 45%; height: 300px;display: inline-block;"></div><br/>
          <div id="chartContainer11" style="width: 45%; height: 300px;display: inline-block;"></div>
          <div id="chartContainer12" style="width: 45%; height: 300px;display: inline-block;"></div>
        </div>
      </div>
    </section>
    <script type="" src="js/canvas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
    <script>
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer1", {
  axisY:{
  margin: 100,
 },
 title: {
    text: "Current Electricity Consumption(kW)",
  },
  animationEnabled:true,
  zoomEnabled:true,
  height: 400,
  width: 800,
  backgroundColor:"#e0d6cc",
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer2", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Electricity Consumption(kW)",
  },
  data: [
    {
      type: "pie",
      dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer3", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Electricity Bills($)",
  },
  axisX: {
    valueFormatString: "MMM",
    interval: 1,
    intervalType: "month",
  },
  axisY: {
    includeZero: false,
  },
  data: [
    {
      type: "line",
      dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer4", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Temperature",
  },
  axisX: {
    interval: 10,
  },
  data: [
    {
      type: "area",
      legendMarkerType: "circle",
      legendMarkerColor: "#b9936c",
      color: "#b9936c",
      showInLegend: true,
      legendText: "Room Temperature",
      dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>},
    {
      type: "area",
      legendMarkerType: "circle",
      legendMarkerColor: "black",
      color: "black",
      showInLegend: true,
      legendText: "Air Conditioner Temperature",
      dataPoints: <?php echo json_encode($dataPoints4_, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer5", {
  axisY:{
  margin: 100,
  backgroundColor:"#e0d6cc",
 },
 title: {
    text: "Rooms Current Electricity Usage",
  },
  animationEnabled:true,
  height: 400,
  width: 800,
  backgroundColor:"#e0d6cc",
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	data: [{
    
		type: "bar", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer6", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Electricity Consumption(kW)",
  },
  data: [
    {
      type: "pie",
      dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer7", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Electricity Bills($)",
  },
  axisX: {
    valueFormatString: "MMM",
    interval: 1,
    intervalType: "month",
  },
  axisY: {
    includeZero: false,
  },
  data: [
    {
      type: "line",
      dataPoints: <?php echo json_encode($dataPoints7, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer8", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Temperature",
  },
  axisX: {
    interval: 10,
  },
  data: [
    {
      type: "area",
      legendMarkerType: "circle",
      legendMarkerColor: "#b9936c",
      color: "#b9936c",
      showInLegend: true,
      legendText: "Room Temperature",
      dataPoints: [
        { x: 10, y: 35, label: "12.00" },
        { x: 20, y: 32, label: "12.01" },
        { x: 30, y: 30, label: "12.02" },
        { x: 40, y: 28, label: "12.03" },
        { x: 50, y: 26, label: "12.04" },
        { x: 60, y: 24, label: "12.05" },
        { x: 70, y: 22, label: "12.06" },
        { x: 80, y: 22, label: "12.07" },
      ],
    },
    {
      type: "area",
      legendMarkerType: "circle",
      legendMarkerColor: "black",
      color: "black",
      showInLegend: true,
      legendText: "Air Conditioner Temperature",
      dataPoints: [
        { x: 10, y: 22, label: "12.00" },
        { x: 20, y: 22, label: "12.01" },
        { x: 30, y: 22, label: "12.02" },
        { x: 40, y: 22, label: "12.03" },
        { x: 50, y: 22, label: "12.04" },
        { x: 60, y: 22, label: "12.05" },
        { x: 70, y: 22, label: "12.06" },
        { x: 80, y: 22, label: "12.07" },
      ],
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer9", {
  axisY:{
  margin: 100,
  backgroundColor:"#e0d6cc",
 },
 title: {
    text: "Current Electricity Consumption(kW)",
  },
  animationEnabled:true,
  height: 400,
  width: 800,
  backgroundColor:"#e0d6cc",
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	data: [{
    
		type: "bar", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints9, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer10", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Electricity Consumption(kW)",
  },
  data: [
    {
      type: "pie",
      dataPoints: <?php echo json_encode($dataPoints10, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer11", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Electricity Bills($)",
  },
  axisX: {
    valueFormatString: "MMM",
    interval: 1,
    intervalType: "month",
  },
  axisY: {
    includeZero: false,
  },
  data: [
    {
      type: "line",
      dataPoints: <?php echo json_encode($dataPoints11, JSON_NUMERIC_CHECK); ?>
    },
  ],
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer12", {
  height: 400,
  width: 800,
  animationEnabled: true,
  backgroundColor:"#e0d6cc",
  title: {
    text: "Temperature",
  },
  axisX: {
    interval: 10,
  },
  data: [
    {
      type: "area",
      legendMarkerType: "circle",
      legendMarkerColor: "#b9936c",
      color: "#b9936c",
      showInLegend: true,
      legendText: "Room Temperature",
      dataPoints: [
        { x: 10, y: 35, label: "12.00" },
        { x: 20, y: 32, label: "12.01" },
        { x: 30, y: 30, label: "12.02" },
        { x: 40, y: 28, label: "12.03" },
        { x: 50, y: 26, label: "12.04" },
        { x: 60, y: 24, label: "12.05" },
        { x: 70, y: 22, label: "12.06" },
        { x: 80, y: 22, label: "12.07" },
      ],
    },
    {
      type: "area",
      legendMarkerType: "circle",
      legendMarkerColor: "black",
      color: "black",
      showInLegend: true,
      legendText: "Air Conditioner Temperature",
      dataPoints: [
        { x: 10, y: 22, label: "12.00" },
        { x: 20, y: 22, label: "12.01" },
        { x: 30, y: 22, label: "12.02" },
        { x: 40, y: 22, label: "12.03" },
        { x: 50, y: 22, label: "12.04" },
        { x: 60, y: 22, label: "12.05" },
        { x: 70, y: 22, label: "12.06" },
        { x: 80, y: 22, label: "12.07" },
      ],
    },
  ],
});
chart.render();
}
</script>
    <script src="js/chart.js"></script>
  </body>
</html>
