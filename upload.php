<?php ob_start();
 include "header.php";
$id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
$about = mysqli_real_escape_string($conn, $_POST['about']);
$investment = mysqli_real_escape_string($conn, $_POST['investment']);
$percentage = mysqli_real_escape_string($conn, $_POST['percentage']);
if ((isset($_POST['submit'])) & (!empty($_FILES['file']['name']))) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('png');
    if (in_array($fileActExt, $allowed)){
      if ($fileError === 0) {
        if ($fileSize < 500000000) {
          $fileNewName = "logo".$id.".".$fileActExt;
          $fileDestination = 'uploads/'.$fileNewName;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sql = "UPDATE listings SET status=0 WHERE user_id='$id';";
          $result = mysqli_query($conn, $sql);
          $sql = "UPDATE listings
SET about =? , investment=? , percentage = ?  WHERE user_id='$id';";
          $stmt =  mysqli_stmt_init($conn);
          mysqli_stmt_prepare($stmt, $sql);
          mysqli_stmt_bind_param($stmt, "sii", $about, $investment, $percentage);
          mysqli_stmt_execute($stmt);
          header("Location: dashboard.php?upload=sucess");
          exit;
        } else{
          echo "file is too large g";
        }
      } else{ header("Location: dashboard.php?upload=fileerror");
        exit;
      }
    }else{
      header("Location: dashboard.php?upload=wrongfiletype");
      exit;
  }} elseif((isset($_POST['submit'])) & (empty($_FILES['file']['name']))) {
    $sql = "UPDATE listings SET status=0 WHERE user_id='$id';";
    $result = mysqli_query($conn, $sql);
    $sql = "UPDATE listings
SET about =? , investment=? , percentage = ?  WHERE user_id='$id';";
    $stmt =  mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sii", $about, $investment, $percentage);
    mysqli_stmt_execute($stmt);
    header("Location: dashboard.php?upload=sucess");
    exit;
  }
  else{
    header("Location: dashboard.php?upload=fail");
    exit;
  } ob_end_flush();?>
