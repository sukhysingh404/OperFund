<?php
include 'header.php';
echo "<body><div class='wrapper'>";
if (isset($_POST['submit-search'])) {
  $search= mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT * FROM listings WHERE user_uid LIKE '%$search%'";
  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  echo '<form class="searchfield" action="search.php" method="POST">
  <input type="text" name="search" placeholder="Search">
  <button type="submit" class="searchbutton" name="submit-search">Search</button>
  </form>';
  if ($queryResult >0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='space'></div>
      <div class='listings'>
      <div class='flex'>
      <div id='indexImg'>
      <img id='indexLogo' src='uploads/logo".$row['user_id'].".png?'".mt_rand().">
      <h2 id='price'>£".$row['investment']."</h2>
      </div>
      <div class='listingInfo'>
       <a class='nextTo' href='listing.php?dw=".$row['user_id']."'><h1>".ucfirst($row['user_uid'])."</h1></a><br>
      <p>".mb_strimwidth($row['about'], 0,800, '...')."</p><br>
      </div>
      </div>



      </div>
      ";
  }} else {
    echo "<p>No results matching</p>";
  }

} else{
  header("Location: index.php?notworking");
}
echo"</div></body>";
 ?>
