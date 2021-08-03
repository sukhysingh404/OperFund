<?php
  include "header.php";
  $user_id = mysqli_real_escape_string($conn, $_GET["dw"]);
  $sql = "SELECT * FROM listings WHERE user_id=?;";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  $about = $row['about'];
  $investment = $row['investment'];
  $percentage = $row['percentage'];
  $purpose = $row['purpose'];
  $sql = "SELECT * FROM contact WHERE user_id=?;";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row2 = mysqli_fetch_assoc($result);
  $contactEmail = $row2['contact_email'];
  $contactNumber = $row2['telephone'];
   $sql = "SELECT * FROM video WHERE user_id=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row3 = mysqli_fetch_assoc($result);
    $status = $row3['status'];

echo '
<div class="wrapper">
<img class="logo" src="uploads/logo'.$user_id.'.png?"'.mt_rand().'>
<div class="tab">

<button class="tablinks" onclick="openCity(event, \'About\')">About</button>
<button class="tablinks" onclick="openCity(event, \'investment\')">Investment</button>
<button class="tablinks" onclick="openCity(event, \'percentage\')">Percentage</button>
<button class="tablinks" onclick="openCity(event, \'contact\')">Contact</button>
</div>

<!-- Tab content -->
<div id="About" class="tabcontent">
<h3>About</h3>
<p>'.$about.'</p>
</div>

<div id="investment" class="tabcontent">
<h3>Investment</h3>
<p>We would like £'.$investment.' for '.$percentage.'%</p>
</div>

<div id="percentage" class="tabcontent">
<h3>Percentage</h3>
<p>'.$percentage.'%</p>
</div>
<div id="contact" class="tabcontent">
<h3>Contact</h3>
<p>Email for inquiries: '.$contactEmail.'</p><br>
<p>Contact number: '.$contactNumber.'</p>
</div>
';

if ($status==0) {
  echo '<video class="video" width="320" height="240" controls>
    <source src="uploads/video'.$user_id.'.mp4" type="video/mp4">

    Your browser does not support the video tag.
  </video>
  </div>
  <div class = "contact">
  </div>
  <script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  </script>

  </body>';
} else{
  echo '</div>
  <div class = "contact">
  </div>
  <script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  </script>

  </body>';
};



 ?>
