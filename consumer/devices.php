<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

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
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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
  <section class="rooms" style="padding-top: 0">
    <div class="livingroom room-item" id="">
      <h1 class="title" id="titleLiv">Manage living room devices</h1>
      <div class="coloumns">
        <div class="AC">
          <div id="ACDisplayL" class="ACDisplay">
            <div id="DispFANL" class="DispFAN">
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
            <div id="DispRoomTemp">T : 32 °C </div>
            <div id="DispTempBoxL" class="DispTempBox">
              <div id="DispTempL" class="DispTemp">25</div>
              <div id="TempUnit">°C </div>
            </div>
          </div>
          <div class="AC_Buttons_box">
            <button class="AC_Button is_Power " id="ananan" onclick="AC_B_PowerL()" type="submit" form="power"
              name="power">O/I</button>
            <button class="AC_Button" onclick="AC_B_UPL()" type="submit">&#9650 </button>
            <button class="AC_Button" onclick="AC_B_FANL()">FAN </button>
            <button class="AC_Button" onclick="AC_B_DOWNL()">&#9660 </button>
          </div>
        </div>
        <div class="lights livLights">
          <h3>Light</h3>
          <div class="slidebutton">
            <label class="switch switch1">
              <?php

              $sql = "SELECT * FROM `livingroom` where `livId` =1";
              $queryLiving = $db->prepare($sql);
              $queryLiving->execute();
              $living = $queryLiving->fetch(PDO::FETCH_ASSOC);

              ?>
              <input onClick="s1()" type="checkbox" name="checkbox1" id="checkbox1" <?php
              if ($living["lightStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="lights livLights">
          <h3>Tv</h3>
          <div class="slidebutton">
            <label class="switch switch1">
              <input onClick="s7()" type="checkbox" name="checkbox7" id="checkbox7" <?php
              if ($living["tvStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="lights livLights">
          <h3>Windows</h3>
          <div class="slidebutton">
            <label class="switch switch1">
              <input onClick="s8()" type="checkbox" name="checkbox8" id="checkbox8" <?php
              if ($living["windowStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="kitchen room-item">
      <h1 class="title">Manage kitchen devices</h1>
      <div class="coloumns">
        <div class="lights livLights">
          <?php
          $sql = "SELECT * FROM `kitchen` where `kitchenId` =1";
          $queryKitchen = $db->prepare($sql);
          $queryKitchen->execute();
          $kitchen = $queryKitchen->fetch(PDO::FETCH_ASSOC);

          ?>
          <h3>Light</h3>
          <div class="slidebutton">
            <label class="switch">
              <input onClick="s3()" type="checkbox" name="checkbox3" id="checkbox3" <?php
              if ($kitchen["lightStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="lights livLights">
          <h3>Windows</h3>
          <div class="slidebutton">
            <label class="switch switch1">
              <input onClick="s9()" type="checkbox" name="checkbox9" id="checkbox9" <?php
              if ($kitchen["windowStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="bedroom room-item" style="margin-bottom: 20rem">
      <h1 class="title">Manage bedroom devices</h1>
      <div class="coloumns">
        <div class="AC">
          <div id="ACDisplayB" class="ACDisplay">
            <div id="DispFANB" class="DispFAN">
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
            <div id="DispRoomTemp">T : 29 °C </div>
            <div id="DispTempBoxB" class="DispTempBox">
              <div id="DispTempB" class="DispTemp">25</div>
              <div id="TempUnit">°C </div>
            </div>
          </div>
          <div class="AC_Buttons_box">
            <button class="AC_Button is_Power" onclick="AC_B_PowerB()">O/I</button>
            <button class="AC_Button" onclick="AC_B_UPB()">&#9650 </button>
            <button class="AC_Button" onclick="AC_B_FANB()">FAN </button>
            <button class="AC_Button" onclick="AC_B_DOWNB()">&#9660 </button>
          </div>
        </div>
        <div class="lights livLights">
          <h3>Light</h3>
          <div class="slidebutton">
            <?php
            $sql = "SELECT * FROM `bedroom` where `bedroomId` =1";
            $queryBedroom = $db->prepare($sql);
            $queryBedroom->execute();
            $bedroom = $queryBedroom->fetch(PDO::FETCH_ASSOC);

            ?>
            <label class="switch">
              <input onClick="s2()" type="checkbox" name="checkbox2" id="checkbox2" <?php
              if ($bedroom["lightStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="lights livLights">
          <h3>Windows</h3>
          <div class="slidebutton">
            <label class="switch switch1">
              <input onClick="s10()" type="checkbox" name="checkbox10" id="checkbox10" <?php
              if ($bedroom["windowStatus"] == 1) {
                echo "checked";

              } else {
                echo "";
              }
              ?> />
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/filter.js"></script>
  <script src="js/switch.js"></script>
</body>

</html>