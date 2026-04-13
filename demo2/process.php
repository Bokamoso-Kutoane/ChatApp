<?php
include "db.php";

if (isset($_POST['send'])){
  mysqli_real_escape_string($name = trim($_POST['name']));
  mysqli_real_escape_string($message = trim($_POST['message']));

  if (!empty($name) && !empty($message)){
    $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
    mysqli_query($conn,$sql);
  }
}

header("Location:index.php");
exit();
?>
