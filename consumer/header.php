<?php include("connect.php")?>
<header>
<script>
  // Sayfa yüklendiğinde çalışacak JavaScript kodu
    window.onload = function() {
      var currentUrl = window.location.href;
      var navLinks = document.querySelectorAll('nav ul li a');

      for (var i = 0; i < navLinks.length; i++) {
        if (navLinks[i].href === currentUrl) {
          navLinks[i].classList.add('current');
          break;
        }
      }
    };
</script>

<script>
       setTimeout(() => {
            document.location.reload();
        }, 10000);
    </script>

      <div id="menu" class="fas fa-bars"></div>
      <nav class="navbar">
        <ul>
          <li><a href="home.php">home</a></li>
          <li><a href="devices.php">devices</a></li>
          <li><a href="room.php">rooms</a></li>
          <li><a href="charts.php">Analyzes</a></li>
          <li><a href="about.php">about</a></li>
          <li><a href="contact.php">contact</a></li>
        </ul>
      </nav>
    </header>