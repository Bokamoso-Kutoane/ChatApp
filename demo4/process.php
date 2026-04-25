<?php
include "db.php";

if (isset($_POST['send'])){
  $name = mysqli_real_escape_string($conn, trim($_POST['name']));
  $message = mysqli_real_escape_string($conn, trim($_POST['message']));

  $transport_choice = $_POST['transport'] ?? 'pidgeon';

  if (!empty($name) && !empty($message)){
    $base_time = 10;

    switch ($transport_choice) {
    case 'pidgeon':
        $base_time = 10;
        break;
    case 'redbull-athlete':
        $base_time = 5;
        break;
    case 'dog':
        $base_time = 18;
        break;
    case 'old-person':
        $base_time = 32;
        break;
    }

    $odds_roll = rand(0,3);
    $delay_minutes = $base_time;
    $status = "On Time!";

    if ($odds_roll == 0){

    } elseif ($odds_roll == 1) {
      $time_saved = rand(1,5);
      $delay_minutes = max(1, $base_time - $time_saved);
      $status = "Early!";
    } else {
      $time_added = rand(1,10);
      $delay_minutes = $base_time + $time_added;
      $status = "Late!";
    }
    
    $sql = "INSERT INTO messages (name, message, scheduled_arrival, transportation, status) 
            VALUES ('$name', '$message', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL $delay_minutes MINUTE), '$transport_choice', '$status')";
    
    mysqli_query($conn, $sql);
  }
}

header("Location: index.php");
exit();
?>
