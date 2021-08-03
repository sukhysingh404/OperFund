<?php
include 'header.php';
 ?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title></title>
  </head>
  <body>
    <div class='wrapper'>
   <br><br>
   <p>Please upload video as a mp4</p>
   <form class='videoupload' action='videoupload.inc.php' method='post' enctype='multipart/form-data'>
   <input type='file' name='video'>
   <button type='submit' name='submit'>Upload video</button>
   </form>

    </div>
  </body>
</html>
