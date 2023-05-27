<?php

$dataPoints1 = array();
$dataPoints2 = array();
$updateInterval = 2000*30; //in millisecond
$initialNumberOfDataPoints = 100;
$x = time() * 1000 - $updateInterval * $initialNumberOfDataPoints;
$y1 = 40;
$y2 = 20;
// generates first set of dataPoints 
for($i = 0; $i < $initialNumberOfDataPoints; $i++){
  $y1 += round(rand(-2, 2));
  $y2 += round(rand(-2, 2));  
  array_push($dataPoints1, array("x" => $x, "y" => $y1));
  array_push($dataPoints2, array("x" => $x, "y" => $y2));
  $x += $updateInterval;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Devices</title>
  <script>
    var temp = 25;
    var FAN_STATE = 0;
    var Power_STATE = 0;
    function AC_B_PowerB() {
      if (Power_STATE == 0) {
        document.getElementById("DispFANB").style["visibility"] = "visible";
        document.getElementById("DispTempBoxB").style["visibility"] =
        "visible";
        document.getElementById("FAN_STATE_AutoB").style["visibility"] =
        "visible";
        Power_STATE = 1;

        if (
          (document.getElementById("FAN_STATE_AutoB").style["visibility"] =
            "visible")
          ) {
          document.getElementById("DispFanBarB").style["visibility"] =
        "hidden";
      }

      var dispTemp = document.getElementById("DispTempB").innerHTML;
      if (dispTemp >= 30) {
        document.getElementById("ACDisplayB").style["backgroundolor"] =
        "red";
      }
    } else {
      document.getElementById("DispFANB").style["visibility"] = "hidden";
      document.getElementById("DispTempBoxB").style["visibility"] =
      "hidden";
      document.getElementById("FAN_STATE_AutoB").style["visibility"] =
      "hidden";

      Power_STATE = 0;
    }
  }
  function AC_B_UPB() {
    if (temp < 30) {
      temp = temp + 1;
      document.getElementById("DispTempB").innerHTML = temp;
    }
  }
  function AC_B_DOWNB() {
    if (temp > 16) {
      temp = temp - 1;
      document.getElementById("DispTempB").innerHTML = temp;
    }
  }
  function AC_B_FANB() {
    FAN_STATE = FAN_STATE + 1;
    if (FAN_STATE > 3) {
      FAN_STATE = 0;
      document.getElementById("FAN_STATE_AutoB").style["visibility"] =
      "visible";
      document.getElementById("DispFanBarB").style["visibility"] = "hidden";
      document.getElementById("FAN_STATE_1B").style["background-color"] =
      "transparent";
      document.getElementById("FAN_STATE_2B").style["background-color"] =
      "transparent";
      document.getElementById("FAN_STATE_3B").style["background-color"] =
      "transparent";
    }
    if (FAN_STATE == 1) {
      console.log("isChecked 4: " + FAN_STATE);
      document.getElementById("FAN_STATE_AutoB").style["visibility"] =
      "hidden";
      document.getElementById("DispFanBarB").style["visibility"] =
      "visible";
      document.getElementById("FAN_STATE_1B").style["background-color"] =
      "black";
    }
    if (FAN_STATE == 2) {
      console.log("isChecked 4: " + FAN_STATE);
      document.getElementById("FAN_STATE_2B").style["background-color"] =
      "black";
    }
    if (FAN_STATE == 3) {
      console.log("isChecked 4: " + FAN_STATE);
      document.getElementById("FAN_STATE_3B").style["background-color"] =
      "black";
    }
  }

  function AC_B_DOWNB() {
    if (temp > 16) {
      temp = temp - 1;
      document.getElementById("DispTempB").innerHTML = temp;
    }
  }
  function AC_B_PowerL() {
    if (Power_STATE == 0) {
      document.getElementById("DispFANL").style["visibility"] = "visible";
      document.getElementById("DispTempBoxL").style["visibility"] =
      "visible";
      document.getElementById("FAN_STATE_AutoL").style["visibility"] =
      "visible";
      Power_STATE = 1;

      if (
        (document.getElementById("FAN_STATE_AutoL").style["visibility"] =
          "visible")
        ) {
        document.getElementById("DispFanBarL").style["visibility"] =
      "hidden";
    }
  } else {
    document.getElementById("DispFANL").style["visibility"] = "hidden";
    document.getElementById("DispTempBoxL").style["visibility"] =
    "hidden";
    document.getElementById("FAN_STATE_AutoL").style["visibility"] =
    "hidden";

    Power_STATE = 0;
  }
}
function AC_B_UPL() {
  if (temp < 30) {
    temp = temp + 1;
    document.getElementById("DispTempL").innerHTML = temp;
  }
}
function AC_B_DOWNL() {
  if (temp > 16) {
    temp = temp - 1;
    document.getElementById("DispTempL").innerHTML = temp;
  }
}
function AC_B_FANL() {
  FAN_STATE = FAN_STATE + 1;
  if (FAN_STATE > 3) {
    FAN_STATE = 0;
    document.getElementById("FAN_STATE_AutoL").style["visibility"] =
    "visible";
    document.getElementById("DispFanBarL").style["visibility"] = "hidden";
    document.getElementById("FAN_STATE_1L").style["background-color"] =
    "transparent";
    document.getElementById("FAN_STATE_2L").style["background-color"] =
    "transparent";
    document.getElementById("FAN_STATE_3L").style["background-color"] =
    "transparent";
  }
  if (FAN_STATE == 1) {
    console.log("isChecked 4: " + FAN_STATE);
    document.getElementById("FAN_STATE_AutoL").style["visibility"] =
    "hidden";
    document.getElementById("DispFanBarL").style["visibility"] =
    "visible";
    document.getElementById("FAN_STATE_1L").style["background-color"] =
    "black";
  }
  if (FAN_STATE == 2) {
    console.log("isChecked 4: " + FAN_STATE);
    document.getElementById("FAN_STATE_2L").style["background-color"] =
    "black";
  }
  if (FAN_STATE == 3) {
    console.log("isChecked 4: " + FAN_STATE);
    document.getElementById("FAN_STATE_3L").style["background-color"] =
    "black";
  }
}
window.onload = function() {

  var updateInterval = <?php echo $updateInterval ?>;
  var dataPoints1 = <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>;
  var dataPoints2 = <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>;
  var yValue1 = <?php echo $y1 ?>;
  var yValue2 = <?php echo $y2 ?>;
  var xValue = <?php echo $x ?>;

  var chart = new CanvasJS.Chart("chartContainer", {
    zoomEnabled: true,
    title: {
      text: "Live Power Consumption of 2 Buildings"
    },
    axisX: {
      title: "chart updates every " + updateInterval / 60000 + " min"
    },
    axisY:{
      suffix: " watts"
    }, 
    toolTip: {
      shared: true
    },
    legend: {
      cursor:"pointer",
      verticalAlign: "top",
      fontSize: 22,
      fontColor: "dimGrey",
      itemclick : toggleDataSeries
    },
    data: [{ 
      type: "line",
      name: "Building A",
      xValueType: "dateTime",
      yValueFormatString: "#,### watts",
      xValueFormatString: "hh:mm:ss TT",
      showInLegend: true,
      legendText: "{name} " + yValue1 + " watts",
      dataPoints: dataPoints1
    },
    {       
      type: "line",
      name: "Building B" ,
      xValueType: "dateTime",
      yValueFormatString: "#,### watts",
      showInLegend: true,
      legendText: "{name} " + yValue2 + " watts",
      dataPoints: dataPoints2
    }]
  });

  chart.render();
  setInterval(function(){updateChart()}, updateInterval);

  function toggleDataSeries(e) {
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
      e.dataSeries.visible = false;
    }
    else {
      e.dataSeries.visible = true;
    }
    chart.render();
  }

  function updateChart() {
    var deltaY1, deltaY2;
    xValue += updateInterval;
  // adding random value
    yValue1 += Math.round(2 + Math.random() *(-2-2));
    yValue2 += Math.round(2 + Math.random() *(-2-2));

  // pushing the new values
    dataPoints1.push({
      x: xValue,
      y: yValue1
    });
    dataPoints2.push({
      x: xValue,
      y: yValue2
    });

  // updating legend text with  updated with y Value 
    chart.options.data[0].legendText = "Air Conditioner " + yValue1 + " watts";
    chart.options.data[1].legendText = "Lights" + yValue2+ " watts"; 
    chart.render();
  }

}
</script>
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>

<link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<?php include("header.php") ?>

  <!-- Control buttons -->
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
  <section class="rooms" style="padding-top: 0;">
    <div class="livingroom room-item" id="">
      <div class="ds">
        <h1 class="title" id="titleLiv">Devices</h1>
        <div class="coloumns">
          <div class="AC">
            <div id="ACDisplayL" class="ACDisplay">
              <div id="DispFANL" class="DispFAN" >
                <b>FAN</b>
                <b id="FAN_STATE_AutoL" class="FAN_STATE_Auto">Auto</b>
                <div id="DispFanBarL" class="DispFanBar">
                  <table>
                    <tr>
                      <th id="FAN_STATE_1L" class="FAN_STATE_1"></th>
                      <th id="FAN_STATE_2L" class="FAN_STATE_2"></th>
                      <th id="FAN_STATE_3L" class="FAN_STATE_3"></th>
                    </tr>
                  </table>
                </div>
              </div>
              <div id="DispRoomTemp" >T : 32 &#8451 </div>
              <div id="DispTempBoxL" class="DispTempBox">
                <div id="DispTempL" class="DispTemp">25</div>
                <div id="TempUnit">&#8451 </div>
              </div>


            </div>
            <div class="AC_Buttons_box">
              <button class="AC_Button is_Power" onclick="AC_B_PowerL()" >O/I</button>
              <button class="AC_Button" onclick="AC_B_UPL()" >&#9650 </button>
              <button class="AC_Button" onclick="AC_B_FANL()">FAN </button>
              <button class="AC_Button" onclick="AC_B_DOWNL()" >&#9660 </button>

            </div>
          </div>
          <div class="lights livLights">
            <h3>Light</h3>
            <div class = "slidebutton">
              <label class="switch switch1">
                <input type="checkbox" checked = true;>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="lights livLights">
            <h3>Tv</h3>
            <div class = "slidebutton">
              <label class="switch switch1">
                <input type="checkbox" checked = true>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="lights livLights">
            <h3>Windows</h3>
            <div class = "slidebutton">
              <label class="switch switch1">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="rowr">
        <h1 class="title" >Graph</h1>
        <div class="col-sm-offset-3 text-center">
          <label class="label label-success">electricity usage</label>
          <div id="pie-chart"></div>
        </div>
      </div>
    </div>  
    <div class="kitchen room-item">
      <div class="ds">
        <h1 class="title">Kitchen</h1>
        <div class="coloumns">
          <div class="lights livLights">
            <h3>Light</h3>
            <div class = "slidebutton">
              <label class="switch ">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="lights livLights">
            <h3>Windows</h3>
            <div class = "slidebutton">
              <label class="switch switch1">
                <input type="checkbox" checked = true>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="rowr">
        <h1 class="title" >Graph</h1>
        </div>
      </div>
    </div>
    <div class="bedroom room-item" style="margin-bottom: 20rem;">
      <div class="ds">
        <h1 class="title">Bedroom</h1>
        <div class="coloumns">
          <div class="AC">
            <div id="ACDisplayB" class="ACDisplay">
              <div id="DispFANB" class="DispFAN" >
                <b>FAN</b>
                <b id="FAN_STATE_AutoB" class="FAN_STATE_Auto">Auto</b>
                <div id="DispFanBarB" class="DispFanBar">
                  <table>
                    <tr>
                      <th id="FAN_STATE_1B" class="FAN_STATE_1"></th>
                      <th id="FAN_STATE_2B" class="FAN_STATE_2"></th>
                      <th id="FAN_STATE_3B" class="FAN_STATE_3"></th>
                    </tr>
                  </table>
                </div>
              </div>
              <div id="DispRoomTemp" >T : 29 &#8451 </div>
              <div id="DispTempBoxB" class="DispTempBox">
                <div id="DispTempB" class="DispTemp">25</div>
                <div id="TempUnit">&#8451 </div>
              </div>


            </div>
            <div class="AC_Buttons_box">
              <button class="AC_Button is_Power" onclick="AC_B_PowerB()" >O/I</button>
              <button class="AC_Button" onclick="AC_B_UPB()" >&#9650 </button>
              <button class="AC_Button" onclick="AC_B_FANB()">FAN </button>
              <button class="AC_Button" onclick="AC_B_DOWNB()" >&#9660 </button>

            </div>
          </div>
          <div class="lights livLights">
            <h3>Light</h3>
            <div class = "slidebutton">
              <label class="switch ">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="lights livLights">
            <h3>Windows</h3>
            <div class = "slidebutton">
              <label class="switch switch1">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="rowr">
        <h1 class="title" >Graph</h1>
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>

    </section> 
    <script src="js/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
    <script src="js/graph.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
  </body>
  </html>
