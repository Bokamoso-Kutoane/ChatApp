<?php
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 0); 
include "db.php";

if (isset($_POST['send'])){
  $name = $_SESSION['username'];
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

    //The message manipulation part
    $damage_roll = rand(1,100);
    $final_message = $message;
    if ($damage_roll <= 70) {

    } elseif ($damage_roll <= 95) {
      $damage_text = "";
      $message_length = strlen($message);

        for ($i = 0; $i < $message_length; $i++) {
          $char_roll = rand(1, 10);

          if ($char_roll == 1) {
            $symbols = ["@", "#", "$", "%", "^", "&", "*", "_", "-", "~", "!", "4", "3", "0", "1"];
            $damage_text .= $symbols[array_rand($symbols)];
          } elseif ($char_roll == 2) {
            $damage_text .= " ";
          } else {
            $damage_text .= $final_message[$i];
          }
        }
      $final_message = $damage_text;
    } else {
      $chaos_roll = rand(1, 3);

      if ($chaos_roll == 1) {
        $cut_point = floor(strlen($final_message) / 2);
        $final_message = substr($final_message, 0, $cut_point);  //this is where the message is cut in half
      } elseif ($chaos_roll == 2) {
        $final_message = str_shuffle($message);
      } else {
        $final_message = "I dont even know bruh"; //this is where you are going to add random messages or other peoples messages
      }
    }



    
    $sql = "INSERT INTO messages (name, message, scheduled_arrival, transportation, status) 
            VALUES ('$name', '$final_message', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL $delay_minutes MINUTE), '$transport_choice', '$status')";

    
    mysqli_query($conn, $sql);
  }
}

header("Location: index.php");
exit();
?>
