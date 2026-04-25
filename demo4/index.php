<?php
  include "db.php";

  $sql = "SELECT * FROM messages WHERE scheduled_arrival <= CURRENT_TIMESTAMP ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);

  $messages = [];

  if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)){
        $messages[] = $row;
      }
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>Bird Noise*</title>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <div class="chat-app">
        <div class="chat-header">
          <h2>Bird Noise* chat app</h2>
          <p>Chat Demo2</p>
        </div>

        <div class="chat-body">
          <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $msg): ?>
              <div class="message-row">
                <div class="message-bubble">
                  <div class="message-top">
                    <span class="username"><?php echo htmlspecialchars($msg['name']); ?></span>
                    <span class="msg-index">delivered using: <?php echo $msg['transportation']; ?></span>
                  </div>
                  
                  <div class="message-text">
                    <?php echo htmlspecialchars($msg['message']); ?>
                  </div>
                  
                  <div class="message-times">
                    <?php echo $msg['time_sent']; ?>
                    <span class="message-status"><?php echo $msg['status'];?></span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-chat">Patience padawan... check the coop later.</div>
          <?php endif; ?>
        </div>

        <div class="chat-footer">
          <form action="process.php" method="POST" class="chat-form">
            <input type="text" name="name" placeholder="Your name" required>
            <input type="text" name="message" placeholder="Type a message..." required>
            <button type="submit" name="send">Send</button>

            <div class="bird-selector" onclick="myFunction()">Select transport
              <span class="popuptext" id="myPopup">
                <select name="transport" required>
                  <option value="pidgeon">Carrier Pidgeon</option>
                  <option value="redbull-athlete">Redbull athlete</option>
                  <option value="dog">Carrier Dog</option>
                  <option value="old-person">Old Person</option>
                </select>
              </span>
            </div>
          </form>
        </div>
  
      </div> <script src="main.js"></script>
    </body>
  </html>
