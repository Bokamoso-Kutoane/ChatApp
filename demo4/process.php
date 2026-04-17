<?php
include "db.php";

if (isset($_POST['send'])){
  // 1. The Bouncer: mysqli_real_escape_string stops bad actors from breaking your DB
  $name = mysqli_real_escape_string($conn, trim($_POST['name']));
  $message = mysqli_real_escape_string($conn, trim($_POST['message']));

  if (!empty($name) && !empty($message)){
    // 2. The Cooking Time: Add a random delay (e.g., 1 to 5 minutes) for the pigeon to fly
    $delay_minutes = 1; 
    
    // Insert the message AND calculate the future arrival time
    $sql = "INSERT INTO messages (name, message, scheduled_arrival) 
            VALUES ('$name', '$message', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL $delay_minutes MINUTE))";
    
    mysqli_query($conn, $sql);
  }
}

header("Location: index.php");
exit();
?>
