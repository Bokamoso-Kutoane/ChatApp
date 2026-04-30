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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="chat-app">
      <div class="chat-sidebar">
        <div class="sidebar-header">BIRD NOISE*</div>
        <div style="text-align:center; padding-top: 50px;">
          <span style="font-size: 3rem;">🐦</span>
          <p style="font-size: 0.7rem; color: #555; padding: 10px;">Login to access the coop.</p>
        </div>

        <div class="footer-info">
          <p class="logo">BOK</p>
          <p>&copy; 2026 Bokamoso Kutoane Portfolio. All Rights Reserved.</p>
          <p>Email: <a href="mailto:kutoanebokamoso505@gmail.com">kutoanebokamoso505@gmail.com</a></p>
        </div>
      </div>

      <div class="chat-main">
        <div class="chat-header">
          <h2 style="margin:0;">LOGIN</h2>
        </div>

        <div class="chat-body auth-flex">
          <div class="auth-box">
            <h3 style="margin-bottom:10px;">Welcome to the coop</h3>
            <p style="color:red; font-size:0.8rem; margin-bottom:10px;"><?php echo $feedback; ?></p>
                
            <form action="login.php" method="POST">
                <div style="text-align:left; margin-bottom:15px;">
                  <label style="font-size:0.7rem; font-weight:bold;">USERNAME</label>
                  <input type="text" name="username" class="auth-input" placeholder="Your username..." required>
                </div>
                <div style="text-align:left; margin-bottom:15px;">
                  <label style="font-size:0.7rem; font-weight:bold;">PASSWORD</label>
                  <input type="password" name="password" class="auth-input" placeholder="Your password..." required>
                </div>
              <button type="submit" name="login_button" class="send-btn" style="width:100%;">LOGIN</button>
            </form>
          </div>
        </div>

        <div class="chat-footer">
          <div class="auth-footer">
            New bird? <a href="register.php" class="auth-link">Join the coop</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
