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
			var Power_STATE =0;
      function AC_B_PowerB(){
        if(Power_STATE ==0){
					document.getElementById("DispFANB").style["visibility"] = "visible";
					document.getElementById("DispTempBoxB").style["visibility"] = "visible";
					document.getElementById("FAN_STATE_AutoB").style["visibility"] = "visible";
					Power_STATE =1;
					
					if(document.getElementById("FAN_STATE_AutoB").style["visibility"] = "visible"){
						document.getElementById("DispFanBarB").style["visibility"] = "hidden";
					}
    
          var dispTemp = document.getElementById("DispTempB").innerHTML;
          if(dispTemp >= 30){
            document.getElementById("ACDisplayB").style["backgroundolor"] = "red"
          }
				}
				else{
					document.getElementById("DispFANB").style["visibility"] = "hidden";
					document.getElementById("DispTempBoxB").style["visibility"] = "hidden";
					document.getElementById("FAN_STATE_AutoB").style["visibility"] = "hidden";
					
					Power_STATE =0;
				}
      }
      function AC_B_UPB(){
				if(temp<30){
					temp = temp+1;
					document.getElementById("DispTempB").innerHTML = temp;
				}
			}
      function AC_B_DOWNB(){
				if(temp>16){
					temp = temp-1;
					document.getElementById("DispTempB").innerHTML = temp;
				}
			}
      function AC_B_FANB(){
				FAN_STATE = FAN_STATE+1;
				if(FAN_STATE>3){
					FAN_STATE =0;
					document.getElementById("FAN_STATE_AutoB").style["visibility"] = "visible";
					document.getElementById("DispFanBarB").style["visibility"] = "hidden";
					document.getElementById("FAN_STATE_1B").style["background-color"] = "transparent";
					document.getElementById("FAN_STATE_2B").style["background-color"] = "transparent";
					document.getElementById("FAN_STATE_3B").style["background-color"] = "transparent";
				}
				if(FAN_STATE == 1){
					console.log('isChecked 4: ' + FAN_STATE);
					document.getElementById("FAN_STATE_AutoB").style["visibility"] = "hidden";
					document.getElementById("DispFanBarB").style["visibility"] = "visible";
					document.getElementById("FAN_STATE_1B").style["background-color"] = "black";
				}
				if(FAN_STATE == 2){
					console.log('isChecked 4: ' + FAN_STATE);
					document.getElementById("FAN_STATE_2B").style["background-color"] = "black";
				}
				if(FAN_STATE == 3){
					console.log('isChecked 4: ' + FAN_STATE);
					document.getElementById("FAN_STATE_3B").style["background-color"] = "black";
				}
			}


      function AC_B_DOWNB(){
				if(temp>16){
					temp = temp-1;
					document.getElementById("DispTempB").innerHTML = temp;
				}
			}
			function AC_B_PowerL(){
				if(Power_STATE ==0){
					document.getElementById("DispFANL").style["visibility"] = "visible";
					document.getElementById("DispTempBoxL").style["visibility"] = "visible";
					document.getElementById("FAN_STATE_AutoL").style["visibility"] = "visible";
					Power_STATE =1;
					
					if(document.getElementById("FAN_STATE_AutoL").style["visibility"] = "visible"){
						document.getElementById("DispFanBarL").style["visibility"] = "hidden";
					}

				}
				else{
					document.getElementById("DispFANL").style["visibility"] = "hidden";
					document.getElementById("DispTempBoxL").style["visibility"] = "hidden";
					document.getElementById("FAN_STATE_AutoL").style["visibility"] = "hidden";
					
					Power_STATE =0;
				}
			}
			function AC_B_UPL(){
				if(temp<30){
					temp = temp+1;
					document.getElementById("DispTempL").innerHTML = temp;
				}
			}
			function AC_B_DOWNL(){
				if(temp>16){
					temp = temp-1;
					document.getElementById("DispTempL").innerHTML = temp;
				}
			}
			function AC_B_FANL(){
				FAN_STATE = FAN_STATE+1;
				if(FAN_STATE>3){
					FAN_STATE =0;
					document.getElementById("FAN_STATE_AutoL").style["visibility"] = "visible";
					document.getElementById("DispFanBarL").style["visibility"] = "hidden";
					document.getElementById("FAN_STATE_1L").style["background-color"] = "transparent";
					document.getElementById("FAN_STATE_2L").style["background-color"] = "transparent";
					document.getElementById("FAN_STATE_3L").style["background-color"] = "transparent";
				}
				if(FAN_STATE == 1){
					console.log('isChecked 4: ' + FAN_STATE);
					document.getElementById("FAN_STATE_AutoL").style["visibility"] = "hidden";
					document.getElementById("DispFanBarL").style["visibility"] = "visible";
					document.getElementById("FAN_STATE_1L").style["background-color"] = "black";
				}
				if(FAN_STATE == 2){
					console.log('isChecked 4: ' + FAN_STATE);
					document.getElementById("FAN_STATE_2L").style["background-color"] = "black";
				}
				if(FAN_STATE == 3){
					console.log('isChecked 4: ' + FAN_STATE);
					document.getElementById("FAN_STATE_3L").style["background-color"] = "black";
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
    <header>
      <h1 class="heading">Devices</h1>
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

    <!-- Control buttons -->
    <section class="devicess">
      <div class="containerr">
        <div
          id="livingroom"
          class="section"
          onclick="location.href='#liv';"
          style="cursor: pointer"
        >
          <div class="content">
            <h1>Living Room</h1>
          </div>
          <div class="overlay"></div>
        </div>

        <div
          id="kitchen"
          class="section"
          onclick="location.href='#kit';"
          style="cursor: pointer"
        >
          <div class="content">
            <h1>Kitchen</h1>
          </div>
          <div class="overlay"></div>
        </div>
        <div
          id="bedroom"
          class="section"
          onclick="location.href='#bed';"
          style="cursor: pointer"
        >
          <div class="content">
            <h1>Bedroom</h1>
          </div>
          <div class="overlay"></div>
        </div>

      </div>
    </section>
    <section class="rooms" style="padding-top: 0;">
      <section class="space" id="liv"></section>
      <div class="livingroom r" id="">
        <h1 class="title" id="titleLiv">Living Room</h1>
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

      <section class="space" id="kit"></section>
      <div class="kitchen r">
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
      <section class="space" id="bed"></section>
      <div class="bedroom r" style="margin-bottom: 20rem;">
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

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
