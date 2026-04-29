<?php
include "db.php";

$me = $_SESSION['username'];

$user_check = mysqli_query($conn, "SELECT onboarding_complete FROM users WHERE username = '$me'");
$user_data = mysqli_fetch_assoc($user_check);

if ($user_data['onboarding_complete'] == 0) {
  header("Location: welcome.php");
  exit();
}

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}


// gets the person we are talking to
$them = $_GET['user'] ?? ''; 

// fetches users for the side thingy
$user_sql = "SELECT username FROM users WHERE username != '$me' ORDER BY username ASC";
$user_result = mysqli_query($conn, $user_sql);
$all_users = mysqli_fetch_all($user_result, MYSQLI_ASSOC);

// gets message only when it matches
$messages = [];
if (!empty($them)) {
  $msg_sql = "SELECT * FROM messages 
              WHERE ((name = '$me' AND receiver = '$them') OR (name = '$them' AND receiver = '$me'))
              AND scheduled_arrival <= CURRENT_TIMESTAMP 
              ORDER BY scheduled_arrival DESC";
  $msg_result = mysqli_query($conn, $msg_sql);
  if ($msg_result) {
    $messages = mysqli_fetch_all($msg_result, MYSQLI_ASSOC);
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
      <title>Bird Noise* Coop</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="chat-app">
      <div class="chat-sidebar">
        <div class="sidebar-header">COOP LIST</div>
          <div class="user-list">
            <?php foreach ($all_users as $user): ?>
              <a href="index.php?user=<?php echo urlencode($user['username']); ?>" 
                class="user-link <?php echo ($them == $user['username']) ? 'active' : ''; ?>">
                🐦 <?php echo htmlspecialchars($user['username']); ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

      <div class="chat-main">
        <div class="chat-header">
          <div class="header-info-top" style="display:flex; justify-content: space-between; align-items:center;">
            <h2 style="margin:0;">
              <?php echo $them ? "Chatting with " . htmlspecialchars($them) : "Bird Noise*"; ?>
            </h2>
            <a href="logout.php" class="logout-btn">Logout</a>
          </div>
          <div style="font-size: 0.7rem; margin-top: 5px; color: #888;">
            Logged in as: <strong><?php echo htmlspecialchars($me); ?></strong>
          </div>
        </div>

        <div class="chat-body">
          <?php if ($them): ?>
            <?php if (!empty($messages)): ?>
              <?php foreach ($messages as $msg): ?>
                <?php $class = (strtolower($msg['name']) === strtolower($me)) ? 'sent' : 'received'; ?>
                <div class="message-row <?php echo $class; ?>">
                  <div class="message-bubble">
                    <div class="message-top">
                      <span class="username"><?php echo htmlspecialchars($msg['name']); ?></span>
                      <span class="msg-index">via: <?php echo $msg['transportation']; ?></span>
                    </div>
                    <div class="message-text"><?php echo htmlspecialchars($msg['message']); ?></div>
                    <div class="message-times"><span><?php echo $msg['time_sent']; ?></span></div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p style="text-align:center; padding-top:20px; color:#888;">No birds have arrived yet...</p>
            <?php endif; ?>
          <?php else: ?>
            <div style="text-align:center; margin-top:100px; color:#888;">
              <p style="font-size: 3rem;">🐦</p>
              <p>Select a bird from the list to start chatting.</p>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($them): ?>
          <div class="chat-footer">
            <form action="process.php" method="POST" class="chat-form">
              <input type="hidden" name="receiver" value="<?php echo htmlspecialchars($them); ?>">
              <div class="bird-selector" onclick="myFunction()">
                Messenger Mode: <span id="current-bird">Carrier Pidgeon</span>
                <span class="popuptext" id="myPopup">
                  <p style="font-size:0.7rem; margin-bottom:5px;">CHOOSE CARRIER</p>
                  <select name="transport" required onchange="document.getElementById('current-bird').innerText = this.options[this.selectedIndex].text">
                    <option value="pidgeon">Carrier Pidgeon</option>
                    <option value="redbull-athlete">Redbull Athlete</option>
                    <option value="dog">Carrier Dog</option>
                    <option value="old-person">Old Person</option>
                  </select>
                </span>
              </div>

              <div class="input-group">
                <input type="text" name="message" placeholder="Send a bird to <?php echo htmlspecialchars($them); ?>..." required autocomplete="off">
                <button type="submit" name="send" class="send-btn">SEND</button>
                <button type="button" class="refresh-btn" onclick="location.reload()">CHECK</button>
              </div>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <script src="main.js"></script>
  </body>
</html>
