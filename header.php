<?php

  session_start();
  include_once 'databaseconnection.php';
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154563401-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154563401-1');
</script>

    <title>Bili</title>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    </head>
<header>
    <nav class = "nav-header">

      <ul class='ul1'>

        <li class = 'li1'><a class='header-nav' href="index.php">Home</a></li>
        <li class = 'li1'><a class='header-nav' href="about.php">About</a></li>
        <li class = 'li1'><a class='header-nav' href="#">Info</a></li>
        <li class = 'li1'><a class='header-nav' href="#">Contact</a></li>




      <?php
      if (isset($_SESSION['useremail'])) {
        echo "<li class = 'li1'><a class='header-nav' href='dashboard.php'>Dashboard</a></li>";

        echo '<form class="logoutbutton" action="includes/logout.inc.php" method="post">
          <button class="logoutbutton2" type="submit" name="logout">Logout</button>
          </form>
          <li class = "li1"><img class = "mylogo2" src="uploads/MyLogo.png" alt="OperFund"></img></li>';

      } else{
        echo"<li class = 'li1' style='float:right'><a class='header-nav' href='login.php'>Login now</a></li>";
          echo "<li class = 'li1' style='float:right'><a class='header-nav' href='sign_up.php'>Register your buisness</a></li>
                <li class = 'li1'><img class = 'mylogo1' src='uploads/MyLogo.png' alt='OperFund'></img></li>";
      }

      ?>

      </ul>

    </nav>
</header>
