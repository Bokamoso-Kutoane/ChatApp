<?php
include "db.php";

if (isset($_POST['send'])){
  $name = mysqli_real_escape_string($conn, trim($_POST['name']));
  $message = mysqli_real_escape_string($conn, trim($_POST['message']));

  if (!empty($name) && !empty($message)){

    $delay_minutes = 1; 

    $sql = "INSERT INTO messages (name, message, scheduled_arrival) 
            VALUES ('$name', '$message', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL $delay_minutes MINUTE))";
    
    mysqli_query($conn, $sql);
  }
}

header("Location: index.php");
exit();
?>
