<?php
include "db.php";

if (isset($_POST['send'])){
  $name = $_SESSION['username'];
  $receiver = $_POST['receiver']; 
  $message = mysqli_real_escape_string($conn, trim($_POST['message']));
  $transport_choice = $_POST['transport'] ?? 'pidgeon';

  if (!empty($name) && !empty($message) && !empty($receiver)){
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

    // Logic for delay
    $odds_roll = rand(0,3);
    $delay_minutes = $base_time;
    if ($odds_roll == 1) {
      $delay_minutes = max(1, $base_time - rand(1,5));
    } elseif ($odds_roll > 1) {
      $delay_minutes = $base_time + rand(1,10);
    }

    // Message damage
    $damage_roll = rand(1,100);
    $final_message = $message;

    if ($damage_roll > 70 && $damage_roll <= 95) {
      $damaged = "";
      $symbols = ["@", "#", "$", "%", "*", "!", "4", "3", "0", "1", "?", "x"]; 
    
      for ($i = 0; $i < strlen($message); $i++) {
        $damaged .= (rand(1, 10) == 1) ? $symbols[array_rand($symbols)] : $message[$i];
      }
      $final_message = $damaged;
    } elseif ($damage_roll > 95) {
      $chaos = rand(1, 3);
      if ($chaos == 1) {
        $final_message = str_shuffle($message);
      } elseif ($chaos == 2) {
        // the "Half-Cut"
        $final_message = substr($message, 0, floor(strlen($message) / 3)) . " ";
      } else {
        $final_message = "I dont even know bruh";
      }
    }

    $sql = "INSERT INTO messages (name, receiver, message, scheduled_arrival, transportation)
            VALUES ('$name', '$receiver', '$final_message',
            DATE_ADD(CURRENT_TIMESTAMP, INTERVAL $delay_minutes MINUTE), '$transport_choice')";
    mysqli_query($conn, $sql);
  }
}

// Redirection thing to the chat youre in
header("Location: index.php?user=" . urlencode($_POST['receiver']));
exit();
?>
