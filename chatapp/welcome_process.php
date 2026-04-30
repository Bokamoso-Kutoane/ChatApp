<?php
include "db.php";

if (isset($_POST['accept_terms'])) {
  $user = $_SESSION['username'];
  mysqli_query($conn, "UPDATE users SET onboarding_complete = 1 WHERE username = '$user'");
  header("Location: index.php");
  exit();
}
?>
