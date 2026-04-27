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
  </head>
  
  <body>
    <div class="chat-app">
      <div class="chat-header">
        <h2>Bird Noise*</h2>
        <p>Sign Up</p>
      </div>

      <div class="chat-body">
        <p>Welcome to the coop</p>
        <br>
        <p><?php echo $feedback; ?></p>
      </div>

      <div class="chat-footer">
        <form action="register.php" method="POST" class="chat-form">
          <input type="text" name="username" placeholder="Pick a username" required>
          <input type="password" name="password" placeholder="Pick a password" required>
          <button type="submit" name="register_button">REGISTER</button>
        </form>
    
        <div class="auth-footer">
          Already a member? <a href="login.php" class="auth-link">Back to Login</a>
        </div>
      </div>

    </div>
  </body>
</html>
