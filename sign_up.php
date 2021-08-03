
<?php
  include 'header.php';
  include_once 'databaseconnection.php';
 ?>
 <div class="wrapper">


  <body>
    <div class="signupbox">
      <h1>Sign up now</h1>
      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
          echo "<p> Fill in all fields</p>";
        }elseif($_GET['error'] == "invalidemailandbusiness"){
          echo "<p> Enter a valid email and business name</p>";
        }elseif($_GET['error'] == "invalidemail"){
          echo "<p> Enter a valid email</p>";
      }elseif($_GET['error'] == "invaliduid"){
        echo "<p> Enter a valid business name</p>";
    }elseif($_GET['error'] == "passwordnomatch"){
      echo "<p> Ensure passwords match</p>";
  }elseif($_GET['error'] == "emailused"){
    echo "<p>An account has already been made with this email</p>";
  }else{
    echo "<p>Error</p>";
  }
}elseif (isset($_GET['signup'])) {
  if ($_GET['signup'] == "success"){
      echo "<p> Sign up was sucessfull!</p>";
  }
}else {
  echo "";
}
       ?>
          <form class="signup" action="includes/signup.inc.php" method="POST">
            <?php
            if (isset($_GET['email'])){
              $email = $_GET['email'];
              echo '<p><label for="email">Email</label></p>
              <br>
              <input type="text" name="email" value="'.$email.'">
              <br>';
            } else {
              echo '<p><label for="email">Email</label></p>
              <br>
              <input type="text" name="email" placeholder="Enter your email">
              <br>';
            }
                          if (isset($_GET['email2'])){
                            $email2 = $_GET['email2'];
                            echo'<p><label for="email2">Re enter Email</label></p>
                            <br>
                            <input type="text" name="email2" value="'.$email2.'">
                            <br>';
                          } else {
                            echo '<p><label for="email">Email</label></p>
                            <br>
                            <input type="text" name="email" placeholder="Enter your email">
                            <br>';
                          }
              ?>
  <html>
            <p><label for="password">password</label></p>
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <p><label for="password2">Re enter Password</label></p>
            <br>
            <input type="password" name="password2" placeholder="Re-enter your Password">
            <br>
            <?php
            if (isset($_GET['business'])){
                          $business = $_GET['business'];
                          echo'<p><label for="Business">Business name</label></p>
                          <br>
                          <input type="text" name="business" value="'.$business.'">
                          <br>';
                        } else {
                          echo '<p><label for="Business">Business name</label></p>
                          <br>
                          <input type="text" name="business" placeholder="Business name">
                          <br>';
                        }
                        if (isset($_GET['first'])){
                                      $first = $_GET['first'];
                                      echo'<p><label for="first">First name</label></p>
                                      <br>
                                      <input type="text" name="first" value="'.$first.'">
                                      <br>';
                                    } else {
                                      echo '<p><label for="first">First name</label></p>
                                      <br>
                                      <input type="text" name="first" placeholder="Firstname">
                                      <br>';
                                    }
                                    if (isset($_GET['last'])){
                                                  $last = $_GET['last'];
                                                  echo'<p><label for="last">Last Name</label></p>
                                                  <br>
                                                  <input type="text" name="last" value="'.$last.'">
                                                  <br>';
                                                } else {
                                                  echo '<p><label for="last">Last Name</label></p>
                                                  <br>
                                                  <input type="text" name="last" placeholder="Lastname">
                                                  <br>';
                                                }

              ?>

            <button class="signupbutton" type="submit" name="sign_up">Submit</button>

          </form>
    </div>
    
  </body>
</div>
</html>
