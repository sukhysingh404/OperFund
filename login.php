<?php
include 'header.php';
include_once 'databaseconnection.php';
  if (!isset($_SESSION['useremail'])){
  if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {


    echo '
    <form class="signupbox" action="includes/login.inc.php" method="POST">
    <h1> Log in now</h1><br>
    <h>Empty fields</h><br><br>
    <input type="text" name="email" placeholder="Enter your email"><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit" name="login" >Submit</button> </form></li>';
} elseif($_GET['error'] == "wrongpassword"){
  echo '
  <form class="signupbox" action="includes/login.inc.php" method="POST">
  <h1> Log in now</h1><br>
  <h>Wrong password</h><br><br>
  <input type="text" name="email" placeholder="Enter your email"><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <button type="submit" name="login" >Submit</button> </form></li>';
} elseif ($_GET['error'] == "nouser") {
  echo '
  <form class="signupbox" action="includes/login.inc.php" method="POST">
  <h1> Log in now</h1><br>
  <h>There is no user with this email, please sign up</h><br><br>
  <input type="text" name="email" placeholder="Enter your email"><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <button type="submit" name="login" >Submit</button> </form></li>';
} else{
  echo '
  <form class="signupbox" action="includes/login.inc.php" method="POST">
  <h1> Log in now</h1><br>
  <h>Please try again</h><br><br>
  <input type="text" name="email" placeholder="Enter your email"><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <button type="submit" name="login" >Submit</button> </form></li>';
}
  }
  else{
    echo'
  <form class="signupbox" action="includes/login.inc.php" method="POST">
  <h1> Log in now</h1><br>
  <input type="text" name="email" placeholder="Enter your email"><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <button type="submit" name="login" >Submit</button> </form></li>';
}} else{
  header("Location: index.php");
}
 ?>
