<?php
  include 'header.php';
  include_once 'databaseconnection.php';
 ?>
 <div class="wrapper">


  <body>
    <div class="signupbox">
      <h1>Enter contact information</h1>
      <?php
      //keeps info
      $id = $_SESSION['user_id'];
      $sql = "SELECT * FROM contact where user_id=?;";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      $Semail = $row['contact_email'];
      $Snumber   = $row['telephone'];





       ?>

            <?php
            if (isset($_SESSION['useremail'])){
            if (isset($_GET['error'])){
            if ($_GET['error'] == "emptyfields"){
              echo"<p>Empty fields</p>
            <form class=\"signup\" action=\"includes/contact.inc.php\" method='GET'>
                ";
                  echo "<label for=\"email\">Enter Email</label><br>";
                if (isset($Semail)){
                  echo "<input type='text' class='email' name='email' value='".$Semail."'><br>";

                }else{
                  echo "<input type='text' name='email' placeholder='Enter your email'><br>";
                }
                echo '<label for="email2"> Re-enter Email</label>
                <br>
                <input type="text" name="email2" placeholder="Enter your email">
                <br>';


                      if (isset($Snumber)){
                        echo "<label for=\"number\">Enter phone number</label>
                        <br><input type='text' name='phone' value='".$Snumber."'><br>";
                      }else{
                        echo "<label for=\"number\">Enter phone number</label>
                        <br><input type='text' name='phone' placeholder='reneter email'><br>";
                      }
                      echo "<label for=\"number2\">Re enter phone number</label>
                      <br>
                      <input type='text' name='phone2' placeholder='Reenter phone number'>";





                        } elseif (($_GET['error'] == "numbersnomatch") || ($_GET['error'] == "emailsnomatch")) {
                          echo"<p>Fields did not match</p>";
                          echo"
                        <form class=\"signup\" action=\"includes/contact.inc.php\" method='GET'>
                            ";
                              echo "<label for=\"email\">Enter Email</label><br>";
                            if (isset($Semail)){
                              echo "<input type='text' class='email' name='email' value='".$Semail."'><br>";

                            }else{
                              echo "<input type='text' name='email' placeholder='Enter your email'><br>";
                            }
                            echo '<label for="email2"> Re-enter Email</label>
                            <br>
                            <input type="text" name="email2" placeholder="Enter your email">
                            <br>';


                                  if (isset($Snumber)){
                                    echo "<label for=\"number\">Enter phone number</label>
                                    <br><input type='text' name='phone' value='".$Snumber."'><br>";
                                  }else{
                                    echo "<label for=\"number\">Enter phone number</label>
                                    <br><input type='text' name='phone' placeholder='reneter email'><br>";
                                  }
                                  echo "<label for=\"number2\">Re enter phone number</label>
                                  <br>
                                  <input type='text' name='phone2' placeholder='Reenter phone number'>";

                                    } else  {  echo"
                                  <form class=\"signup\" action=\"includes/contact.inc.php\" method='GET'>
                                      ";
                                        echo "<label for=\"email\">Enter Email</label><br>";
                                      if (isset($Semail)){
                                        echo "<input type='text' class='email' name='email' value='".$Semail."'><br>";

                                      }else{
                                        echo "<input type='text' name='email' placeholder='Enter your email'><br>";
                                      }
                                      echo '<label for="email2"> Re-enter Email</label>
                                      <br>
                                      <input type="text" name="email2" placeholder="Enter your email">
                                      <br>';


                                            if (isset($Snumber)){
                                              echo "<label for=\"number\">Enter phone number</label>
                                              <br><input type='text' name='phone' value='".$Snumber."'><br>";
                                            }else{
                                              echo "<label for=\"number\">Enter phone number</label>
                                              <br><input type='text' name='phone' placeholder='reneter email'><br>";
                                            }
                                            echo "<label for=\"number2\">Re enter phone number</label>
                                            <br>
                                            <input type='text' name='phone2' placeholder='Reenter phone number'>";
                                                    ;}}



                                                    else {

                                                        echo"
                                                      <form class=\"signup\" action=\"includes/contact.inc.php\" method='GET'>
                                                          ";
                                                            echo "<label for=\"email\">Enter Email</label><br>";
                                                          if (isset($Semail)){
                                                            echo "<input type='text' class='email' name='email' value='.$Semail.'><br>";

                                                          }else{
                                                            echo "<input type='text' name='email' placeholder='Enter your email'><br>";
                                                          }
                                                          echo '<label for="email2"> Re-enter Email</label>
                                                          <br>
                                                          <input type="text" name="email2" placeholder="Enter your email">
                                                          <br>';


                                                                if (isset($Snumber)){
                                                                  echo "<label for=\"number\">Enter phone number</label>
                                                                  <br><input type='text' name='phone' value='".$Snumber."'><br>";
                                                                }else{
                                                                  echo "<label for=\"number\">Enter phone number</label>
                                                                  <br><input type='text' name='phone' placeholder='reneter email'><br>";
                                                                }
                                                                echo "<label for=\"number2\">Re enter phone number</label>
                                                                <br>
                                                                <input type='text' name='phone2' placeholder='Reenter phone number'>";



                                                    }} else{
                                                      header("Location:index.php");
                                                    }

              ?>



<br><br>
            <button class="signupbutton" type="submit" name="sign_up">Submit</button>

          </form>
    </div>
  </body>
</div>
