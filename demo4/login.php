<?php
include "db.php";

$feedback = "";

if (isset($_POST['login_button'])) {
  $username = mysqli_real_escape_string($conn, trim($_POST['username']));
  $password = mysqli_real_escape_string($conn, trim($_POST['password']));

  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $feedback = "successfully logged in. Welcome back!";
      $_SESSION['username'] =  $row['username'];
      header("Location: index.php");
      exit();
    } else {
      $feedback = "Incorrect password, try again next time";
    }
  } else {
    $feedback = "No account found with that username";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bird Noise* Login Centre</title>
    <link rel="stylesheet" href="style.css">
  </head>
  
  <body>
    <div class="chat-app">
      <div class="chat-header">
        <h2>Bird Noise*</h2>
        <p>Login</p>
      </div>

      <div class="chat-body">
        <p>Welcome to the coop</p>
        <br>
        <p style="color: green; font-weight: bold;">
          <?php 
            // from the register page
            if(isset($_GET['registered'])) {
              echo "Account created! Please log in below.";
            } else {
              echo $feedback; 
            }
          ?>
        </p>
      </div>

      <div class="chat-footer">
        <form action="login.php" method="POST" class="chat-form">
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit" name="login_button">LOGIN</button>
        </form>
    
        <div class="auth-footer">
          New bird? <a href="register.php" class="auth-link">Join the coop</a>
        </div>
      </div>

    </div>
  </body>
</html>
