<?php
include "db.php";

$feedback = "";


if (isset($_POST['register_button'])){
  $username = mysqli_real_escape_string($conn, trim($_POST['username']));
  $password = mysqli_real_escape_string($conn, trim($_POST['password']));

  if (!empty($username) && !empty($password)) {
    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0){
      $feedback = "Sorry, try again. Username is already taken";
    } else {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $insert_sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

      if (mysqli_query($conn, $insert_sql)) {
        header("Location: login.php?registered=true");
        exit();
      } else {
        $feedback = "Oops. Something went wrong, please try again";
      }
    }
  } else {
    $feedback = "Please fill in all the fields, thank you";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bird Noise* Registration Centre</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="chat-app">
      <div class="chat-sidebar">
        <div class="sidebar-header">BIRD NOISE*</div>
        <div style="text-align:center; padding-top: 50px;">
          <span style="font-size: 3rem;">🐣</span>
          <p style="font-size: 0.7rem; color: #555; padding: 10px;">New around here?<br>Get your wings.</p>
        </div>

        <div class="footer-info">
          <p class="logo">BOK</p>
          <p>&copy; 2026 Bokamoso Kutoane Portfolio. All Rights Reserved.</p>
          <p>Email: <a href="mailto:kutoanebokamoso505@gmail.com">kutoanebokamoso505@gmail.com</a></p>
        </div>
      </div>

      <div class="chat-main">
        <div class="chat-header">
          <h2 style="margin:0;">SIGN UP</h2>
        </div>

        <div class="chat-body auth-flex">
          <div class="auth-box">
            <h3 style="margin-bottom:10px;">Join the coop</h3>
            <p style="color:red; font-size:0.8rem; margin-bottom:10px;"><?php echo $feedback; ?></p>

            <form action="register.php" method="POST">
              <div style="text-align:left; margin-bottom:15px;">
                <label style="font-size:0.7rem; font-weight:bold;">PICK A USERNAME</label>
                <input type="text" name="username" class="auth-input" placeholder="Desired username..." required>
              </div>
              <div style="text-align:left; margin-bottom:15px;">
                <label style="font-size:0.7rem; font-weight:bold;">PICK A PASSWORD</label>
                <input type="password" name="password" class="auth-input" placeholder="Secret password..." required>
              </div>
              <button type="submit" name="register_button" class="send-btn" style="width:100%;">REGISTER</button>
            </form>
          </div>
        </div>

        <div class="chat-footer">
          <div class="auth-footer">
            Already a member? <a href="login.php" class="auth-link">Back to Login</a>
          </div>
        </div>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
