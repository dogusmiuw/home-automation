var data = "";
var s5val = 0;
var flag_load = 0;
var btn = "";
var irstatus = 0;
var irresult = 0;
var wifires = 0;
var sa1 = 0;
var sa2 = 0;
var sa3 = 0;
var sa4 = 0;
var fa = 0;
var swt_typ = 0;
InitWebSocket();

function InitWebSocket() {
  websock = new WebSocket("ws://" + window.location.hostname + ":88/");
  websock.onmessage = function (evt) {
    JSONobj = JSON.parse(evt.data);
    sa1 = JSONobj.sw1;
    sa2 = JSONobj.sw2;
    sa3 = JSONobj.sw3;
    sa4 = JSONobj.sw4;
    fa = JSONobj.fan;
    s5val = JSONobj.sw5;
    wifires = JSONobj.wifires;
    swt_typ = JSONobj.swttyp;
    console.log(s5val);
    if (sa1 == 0) {
      // Any scope
      document.getElementById("checkbox1").checked = false;
      console.log("Sw1=off");
    }
    if (sa1 == 1) {
      // Any scope
      document.getElementById("checkbox1").checked = true;
      console.log("Sw1=on");
    }
    if (sa2 == 0) {
      // Any scope
      document.getElementById("checkbox2").checked = false;
    }
    if (sa2 == 1) {
      // Any scope
      document.getElementById("checkbox2").checked = true;
    }
    if (sa3 == 0) {
      // Any scope
      document.getElementById("checkbox3").checked = false;
    }
    if (sa3 == 1) {
      // Any scope
      document.getElementById("checkbox3").checked = true;
    }
    if (sa4 == 0) {
      // Any scope
      document.getElementById("checkbox4").checked = false;
    }
    if (sa4 == 1) {
      // Any scope
      document.getElementById("checkbox4").checked = true;
    }

    if (s5val >= 80) {
      document.getElementById("radio1-5").checked = true;
      console.log("5");
      console.log(s5val);
    } else if (s5val < 80 && s5val >= 65) {
      document.getElementById("radio1-4").checked = true;
      console.log("4");
      console.log(s5val);
    } else if (s5val < 65 && s5val >= 45) {
      document.getElementById("radio1-3").checked = true;
      console.log("3");
      console.log(s5val);
    } else if (s5val < 45 && s5val >= 25) {
      document.getElementById("radio1-2").checked = true;
    } else if (s5val <= 25) {
      document.getElementById("radio1-1").checked = true;
    }

    if (fa == 0) {
      // Any scope
      document.getElementById("checkbox5").checked = false;
      fanoff();
    }
    if (fa == 1) {
      // Any scope
      document.getElementById("checkbox5").checked = true;
    }

    if (swt_typ) {
      document.getElementById("swtyp1").style["box-shadow"] =
        "0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3";
      document.getElementById("swtyp0").style["box-shadow"] = "none";
    } else {
      document.getElementById("swtyp0").style["box-shadow"] =
        "0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3";
      document.getElementById("swtyp1").style["box-shadow"] = "none";
    }

    document.getElementById("irval").value = JSONobj.irval;

    irresult = JSONobj.irres;
    switch (irresult) {
      case 0:
        document.getElementById("irres").value = "Receiver Mode Off";
        break;
      case 1:
        document.getElementById("irres").value = "IR value saved for Switch 1";
        break;
      case 2:
        document.getElementById("irres").value = "IR value saved for Switch 2";
        break;
      case 3:
        document.getElementById("irres").value = "IR value saved for Switch 3";
        break;
      case 4:
        document.getElementById("irres").value = "IR value saved for Switch 4";
        break;
      case 5:
        document.getElementById("irres").value =
          "IR value saved for Fan ON/OFF";
        break;
      case 6:
        document.getElementById("irres").value = "IR value saved for Fan High";
        break;
      case 7:
        document.getElementById("irres").value = "IR value saved for Fan Low";
        break;
      case 8:
        document.getElementById("irres").value = "IR value not saved";
        break;
      case 9:
        document.getElementById("irval").value = "Error";
        break;
    }

    if (wifires == 1) {
      alert("wifi saved successfully");
    }
    if (wifires == 2) {
      alert("wifi not saved!!!");
    }
  };
}

function s1() {
  btn = "sw1=1";
  if (document.getElementById("checkbox1").checked == true) btn = "sw1=1";
  else btn = "sw1=0";
  console.log(btn);
  websock.send(btn);
}

function s2() {
  btn = "sw2=1";
  if (document.getElementById("checkbox2").checked == true) btn = "sw2=1";
  else btn = "sw2=0";
  websock.send(btn);
}

function s3() {
  btn = "sw3=1";
  if (document.getElementById("checkbox3").checked == true) btn = "sw3=1";
  else btn = "sw3=0";
  websock.send(btn);
}

function s4() {
  btn = "sw4=1";
  if (document.getElementById("checkbox4").checked == true) btn = "sw4=1";
  else btn = "sw4=0";
  websock.send(btn);
}

function fan() {
  if (document.getElementById("checkbox5").checked == true) btn = "fan=1";
  else {
    btn = "fan=0";
    fanoff();
  }
  websock.send(btn);
}
if (document.getElementById("checkbox5").checked == true) {
  function s5(fanval) {
    btn = "dim=" + fanval;
    websock.send(btn);
  }
} else {
}

function s6() {
  btn = "sw6=1";
  if (
    document.getElementById("checkbox1").checked == true ||
    document.getElementById("checkbox2").checked == true ||
    document.getElementById("checkbox3").checked == true ||
    document.getElementById("checkbox5").checked == true
  ) {
    document.getElementById("checkbox1").checked = false;
    document.getElementById("checkbox2").checked = false;
    document.getElementById("checkbox3").checked = false;
    document.getElementById("checkbox5").checked = false;
    fanoff();
    btn = "sw6=0";
  } else {
    document.getElementById("checkbox1").checked = true;
    document.getElementById("checkbox2").checked = true;
    document.getElementById("checkbox3").checked = true;
    document.getElementById("checkbox5").checked = true;
    btn = "sw6=1";
  }
  websock.send(btn);
}

function hidemain() {
  var x = document.getElementById("wrap");
  var y = document.getElementById("conf");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}

function hideconf() {
  var x = document.getElementById("wrap");
  var y = document.getElementById("conf");
  if (y.style.display === "none") {
    y.style.display = "block";
    x.style.display = "none";
  } else {
    y.style.display = "none";
    x.style.display = "block";
  }
}

function IRrec(status) {
  if (status === 0) {
    btn = "IR=0";
    irstatus = 0;
    document.getElementById("irres").value = "Reciver Mode OFF";
    websock.send(btn);
  } else {
    btn = "IR=1";
    irstatus = 1;
    document.getElementById("irres").value = "Reciver Mode ON";
    websock.send(btn);
  }
}

function sw_status(func) {
  switch (func) {
    case 0:
      btn = "swttyp=0";
      document.getElementById("swtyp0").style["box-shadow"] =
        "0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3";
      document.getElementById("swtyp1").style["box-shadow"] = "none";
      break;
    case 1:
      btn = "swttyp=1";
      document.getElementById("swtyp1").style["box-shadow"] =
        "0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3";
      document.getElementById("swtyp0").style["box-shadow"] = "none";
      break;
  }
  websock.send(btn);
}

function save_ir(func) {
  if (irstatus) {
    switch (func) {
      case 1:
        btn = "saveIR=1";
        break;
      case 2:
        btn = "saveIR=2";
        break;
      case 3:
        btn = "saveIR=3";
        break;
      case 4:
        btn = "saveIR=4";
        break;
      case 5:
        btn = "saveIR=5";
        break;
      case 6:
        btn = "saveIR=6";
        break;
      case 7:
        btn = "saveIR=7";
        break;
    }
    websock.send(btn);
  } else {
    alert("First click on Receive Button");
  }
}

function reset() {
  var r = confirm(
    "Do You want to Reset the device??!!\nAll Data will be deleted."
  );
  if (r == true) {
    btn = "rst=1";
    websock.send(btn);
  } else {
    alert("Cancel!!!");
  }
}

function reboot() {
  var r = confirm("Do You want to Reboot the device?");
  if (r == true) {
    btn = "rbt=1";
    websock.send(btn);
  } else {
    alert("Cancel!!!");
  }
}

function alertbox() {
  alert("Under Progress!!");
}

function wifi() {
  var r = confirm(
    "Do You want to save the wifi setting ??!!\n Please note if username or password you entered is wrong then system will not connect to wifi."
  );
  if (r == true) {
    if (document.getElementById("uname").value == "") {
      alert("User name may not be blank");
      return;
    } else if (document.getElementById("pwd").value == "") {
      var s = confirm("Password is blank ??!!\n Do you want to continue?");
      if (s == false) {
        return;
      }
    }
    btn =
      "wun=" +
      document.getElementById("uname").value +
      ":pwd=" +
      document.getElementById("pwd").value;
    websock.send(btn);
  } else {
    alert("Cancelled ");
  }
}

function fanoff() {
  document.getElementById("radio1-1").checked = false;
  document.getElementById("radio1-2").checked = false;
  document.getElementById("radio1-3").checked = false;
  document.getElementById("radio1-4").checked = false;
  document.getElementById("radio1-5").checked = false;
}

function onpageload() {
  btn = "pageload=1";
  websock.send(btn);
}
