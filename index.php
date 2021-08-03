<?php
  include 'header.php';
 ?>
<body>
<div class="wrapper">
  <form class="searchfield" action="search.php" method='POST'>
  <input type="text" name="search" placeholder="Search">
  <button type="submit" class='searchbutton' name="submit-search">Search</button>
</form>
 <h1>Recent Listings</h1>

  <div class="listings-box">


    <?php
      $sql= "SELECT * FROM listings WHERE status=0 ORDER BY updated_at2 DESC;";
      $result= mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);
      if ($queryResults>0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='space'></div>
          <div class='listings'>
          <div class='flex'>
          <div id='indexImg'>
          <img id='indexLogo' alt='logo' src='uploads/logo".$row['user_id'].".png?'".mt_rand().">
          <h2 id='price'>£".$row['investment']."</h2>
          </div>
          <div class='listingInfo'>
           <a class='nextTo' href='listing.php?dw=".$row['user_id']."'><h1>".ucfirst($row['user_uid'])."</h1></a><br>
          <p>".mb_strimwidth($row['about'], 0,800, '...')."</p><br>
          </div>
          </div>



          </div>
          ";
        }
      }else{
        echo "no listings";
      }
     ?>
     </div>
  </div>
</div>
</body>
