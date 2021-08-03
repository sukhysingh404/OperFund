<?php include 'header.php';
if (isset($_SESSION['useremail'])) {
  $sql = "SELECT * FROM users2;";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0){
      $id = $_SESSION['user_id'];
      $sql = "SELECT * FROM listings where user_id=?;";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      $_SESSION['about'] = $row['about'];
      $_SESSION['investment'] = $row['investment'];
      $_SESSION['percentage'] = $row['percentage'];
      $_SESSION['purpose'] = $row['purpose'];
      $about = $_SESSION['about'];
      $investment = $_SESSION['investment'];
      $percentage = $_SESSION['percentage'];
      $purpose = $_SESSION['purpose'];
      echo "<div class='wrapper'>";
        if ($row['status'] == 0){
          if (isset($_GET['upload'])){
            if (($_GET['upload'] == "fileerror") || ($_GET['upload'] == "fail")){
              echo "<p>Please try again</p>
              <img class='logo' src='uploads/logo".$id.".png?'".mt_rand().">
              <br>
              <label for='file'>Upload Logo</label>
              <form action='upload.php' method='post' enctype='multipart/form-data'>
                <input type='file' name='file'><br>";
                if (isset($about)){
                  echo "<label for='about'>About Your company</label><br>
                  <textarea type='text' name='about'>".$about."</textarea><br>";
                }else{
                  echo "<label for='about'>About Your company</label><br>
                  <input type='text' class='about' name='about' placeholder='About your company'><br>";
                }
                      if (isset($investment)){
                        echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                        <input type='number' name='investment' value='".$investment."'><br>";
                      }else{
                        echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                        <input type='number' name='investment' placeholder='(£) Investment Amount(£)'><br>";
                      }
                          if (isset($percentage)){
                            echo "<label for='percentage'>Percentage in return</label><br>
                            <input type='number' name='percentage' min='0' max='100' value='".$percentage."'><br>";
                          } else{
                            echo " <label for='percentage'>Percentage in return</label><br>
                            <input type='number' name='percentage' min='0' max='100' placeholder='percentage in return'><br>";
                          } echo "<button type='submit' name='submit' >upload information</button><br><br></form>";
          }elseif ($_GET['upload'] == "wrongfiletype") {
            echo "<p>Please upload the logo as a png file</p>
            <img class='logo' src='uploads/logo".$id.".png?'".mt_rand().">
            <br>
            <label for='file'>Upload Logo</label>
            <form action='upload.php' method='post' enctype='multipart/form-data'>
              <input type='file' name='file'><br>";
              if (isset($about)){
                echo "<label for='about'>About Your company</label><br>
                <textarea type='text' name='about'>".$about."</textarea><br>";
              }else{
                echo "<label for='about'>About Your company</label><br>
                <input type='text' class='about' name='about' placeholder='About your company'><br>";
              }
                    if (isset($investment)){
                      echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                      <input type='number' name='investment' value='".$investment."'><br>";
                    }else{
                      echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                      <input type='number' name='investment' placeholder='(£) Investment Amount(£)'><br>";
                    }
                        if (isset($percentage)){
                          echo "<label for='percentage'>Percentage in return</label><br>
                          <input type='number' name='percentage' min='0' max='100' value='".$percentage."'><br>";
                        } else{
                          echo " <label for='percentage'>Percentage in return</label><br>
                          <input type='number' name='percentage' min='0' max='100' placeholder='percentage in return'><br>";
                        } echo "<button type='submit' name='submit' >upload information</button><br><br></form>";
          }elseif ($_GET['upload'] == "sucess") {
            echo "<p>Information was sucessfully uploaded</p>
            <img class='logo' src='uploads/logo".$id.".png?'".mt_rand().">

            <br>
            <label for='file'>Upload Logo</label>
            <form action='upload.php' method='post' enctype='multipart/form-data'>
              <input type='file' name='file'><br>";
              if (isset($about)){
                echo "<label for='about'>About Your company</label><br>
                <textarea type='text' name='about'>".$about."</textarea><br>";

              }else{
                echo "<label for='about'>About Your company</label><br>
                <input type='text' class='about' name='about' placeholder='About your company'><br>";
              }
                    if (isset($investment)){
                      echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                      <input type='number' name='investment' value='".$investment."'><br>";
                    }else{
                      echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                      <input type='number' name='investment' placeholder='(£) Investment Amount(£)'><br>";
                    }
                        if (isset($percentage)){
                          echo "<label for='percentage'>Percentage in return</label><br>
                          <input type='number' name='percentage' min='0' max='100' value='".$percentage."'><br>";
                        } else{
                          echo "<label for='percentage'>Percentage in return</label><br>
                          <input type='number' name='percentage' min='0' max='100' placeholder='percentage in return'><br>";
                        } echo "<button type='submit' name='submit' >upload information</button><br><br></form>";
        }}else{
          echo "
          <img class='logo' src='uploads/logo".$id.".png?'".mt_rand().">

          <br>
          <label for='file'>Upload Logo</label>
          <form action='upload.php' method='POST' enctype='multipart/form-data'>
            <input type='file' name='file'><br>";
            if (isset($about)){
              echo "<label for='about'>About Your company</label><br>
              <textarea type='text' name='about'>".$about."</textarea><br>";
            }else{
              echo "<label for='about'>About Your company</label><br>
              <input type='text' class='about' name='about' placeholder='About your company'><br>";
          }    if (isset($investment)){
                    echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                    <input type='number' name='investment' value='".$investment."'><br>";
                  }else{
                    echo "<label for='Investment Amount(£)'>Investment Amount(£)</label><br>
                    <input type='number' name='investment' placeholder='(£) Investment Amount(£)'><br>";
                  }
                      if (isset($percentage)){
                        echo "<label for='percentage'>Percentage in return</label><br>
                        <input type='number' name='percentage' min='0' max='100' value='".$percentage."'>";
                      } else{
                        echo "<label for='percentage'>Percentage in return</label><br>
                        <input type='number' name='percentage' min='0' max='100' placeholder='percentage in return'><br>";
                      } echo "<br><button type='submit' name='submit' >upload information</button><br><br></form>";
        }
      }else{
        echo '<div class="registerbox"><p>Please register your buisness information</p>
        <p>Enter logo as .png</p>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="SelctImage">
          <div class="upload-btn-wrapper">
          <button class="uploadButton">Upload your logo</button>
          <input type="file" class="uploadFile" name="file">
          </div><br>

          <textarea name="about" class="AboutYourCompany" placeholder="About your company"></textarea><br>
          <textarea name="summary" class="summary"placeholder="Tell us your mission"></textarea><br>
          <input type="number" name="investment" class="investmentInput" placeholder="(£) Investment Amount(£)"><br>
          <input type="number" name="percentage" class="percentageInput" min="0" max="100" placeholder="percentage in return" style="width:30%"><br>
          <button type="submit" name="submit" >Upload Your infomation</button>

        </form>';
}}$id = $_SESSION['user_id'];
$sql = "SELECT * FROM contact where user_id=?;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$_SESSION['status'] = $row['status'];
$status = $_SESSION['status'];
if ($status == 1) {
  echo "<a href='contact.php'>Change your contact information</a>";
} else{
  echo "<a href='contact.php'>Register your contact information</a>";
} echo "<br>";
 echo "<br>";
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM video where user_id=?;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$_SESSION['status'] = $row['status'];
$status =$_SESSION['status'];
if ($status == 0) {
  echo "<a href='videoupload.php'>Change your video</a>";
} else{
  echo "<a href='videoupload.php'>Upload a video</a>";
}
echo "</div></div></div>";}
 else {
  header("location:index.php");
}?>
