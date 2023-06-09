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

function s1() {
  


  if (document.getElementById('checkbox1') != null) {
    
    var checkStatus = document.getElementById("checkbox1").checked;
    
  
    
      console.log('csdjfks')
      // AJAX ile HTTP isteği gönderme
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'change-status.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        
        if (xhr.readyState === 4 && xhr.status === 200) {
          
          console.log(xhr.responseText);
          // İstek tamamlandıktan sonra geri dönen yanıtı işleyebilirsiniz
          xhr.responseText;
        }
      };
      var params =
        "onof=" + encodeURIComponent(checkStatus);
         xhr.send(params);
  
      // Başarılı bir şekilde değişiklikler yapıldıktan sonra kullanıcıya geri bildirim verebilirsiniz.
      // alert("Değişiklikler başarıyla kaydedildi.");
    };
  }


function s2() {
  if (document.getElementById('checkbox2') != null) {
    
    var checkStatus = document.getElementById("checkbox2").checked;
    
  
    
      console.log('csdjfks')
      // AJAX ile HTTP isteği gönderme
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'change-bedroom.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        
        if (xhr.readyState === 4 && xhr.status === 200) {
          
          console.log(xhr.responseText);
          // İstek tamamlandıktan sonra geri dönen yanıtı işleyebilirsiniz
          xhr.responseText;
        }
      };
      var params =
        "onof=" + encodeURIComponent(checkStatus);
         xhr.send(params);
  
      // Başarılı bir şekilde değişiklikler yapıldıktan sonra kullanıcıya geri bildirim verebilirsiniz.
      // alert("Değişiklikler başarıyla kaydedildi.");
    };
}

function s3() {
  if (document.getElementById('checkbox3') != null) {
    
    var checkStatus = document.getElementById("checkbox3").checked;
    
  
    
      console.log('csdjfks')
      // AJAX ile HTTP isteği gönderme
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'change-kitchen.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        
        if (xhr.readyState === 4 && xhr.status === 200) {
          
          console.log(xhr.responseText);
          // İstek tamamlandıktan sonra geri dönen yanıtı işleyebilirsiniz
          xhr.responseText;
        }
      };
      var params =
        "onof=" + encodeURIComponent(checkStatus);
         xhr.send(params);
  
      // Başarılı bir şekilde değişiklikler yapıldıktan sonra kullanıcıya geri bildirim verebilirsiniz.
      // alert("Değişiklikler başarıyla kaydedildi.");
    };
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
