<?php
include "header.php";
$id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

if (isset($_POST['submit'])) {
    $file = $_FILES['video'];
    $fileName = $_FILES['video']['name'];
    $fileTmpName = $_FILES['video']['tmp_name'];
    $fileSize = $_FILES['video']['size'];
    $fileError = $_FILES['video']['error'];
    $fileType = $_FILES['video']['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('mp4');

    if (in_array($fileActExt, $allowed)){
      if ($fileError === 0) {
        if ($fileSize < 500000000) {
          $fileNewName = "video".$id.".".$fileActExt;
          $fileDestination = 'uploads/'.$fileNewName;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sql = "UPDATE video SET status=0 WHERE user_id='$id';";
          $result = mysqli_query($conn, $sql);
          header("Location: dashboard.php?upload=sucess");
          exit();
        } else{
          echo "file is too large g";
        }
      } else{ header("Location: videoupload.php?upload=fileerror");

      }

    }else{
      header("Location: videoupload.php?upload=wrongfiletype");


  }} else {
    echo "error";
  }
 ?>
