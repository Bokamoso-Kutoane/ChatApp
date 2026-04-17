<?php
include "db.php";

if (isset($_POST['send'])){
  $name = trim($_POST['name']);
  $message = trim($_POST['message']);

  if (!empty($name) && !empty($message)){
    $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
    mysqli_query($conn,$sql);
  }
}

header("Location:index.php");
exit();
?>
