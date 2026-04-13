<?php
  include "db.php";

  $sql = "SELECT * FROM messages ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);

  $messages = [];

  while ($row = mysqli_fetch_assoc($result)){
    $messages[] = $row;
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>Bird Noise*</title>
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
                    <span class="msg-index">#<?php echo $msg['id']; ?></span>
                  </div>
                  
                  <div class="message-text">
                    <?php echo htmlspecialchars($msg['message']); ?>
                  </div>
                  
                  <div class="message-times">
                    <?php echo $msg['time_sent']; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty-chat">Patience padawan</div>
          <?php endif; ?>
        </div>

        <div class="chat-footer">
          <form action="process.php" method="POST" class="chat-form">
            <input type="text" name="name" placeholder="Your name" required>
            <input type="text" name="message" placeholder="Type a message..." required>
            <button type="submit" name="send">Send</button>
          </form>
        </div>
  
      </div>
    </body>
  </html>
