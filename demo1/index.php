<?php
include "db.php";
$sql = "SELECT * FROM messages ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
// put database rows into a PHP array
$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
$messages[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Class Chat</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="chat-app">
<div class="chat-header">
<h2>Bird Noise*</h2>
<p>Bird Noise* chat Demo</p>
</div>
<div class="chat-body">
<?php if (!empty($messages)): ?>
<?php foreach ($messages as $msg): ?>
<div class="message-row">
<div class="message-bubble">
<div class="message-top">
<span class="username"><?php echo htmlspecialchars($msg['name']);
?></span>
<span class="msg-index">#<?php echo $msg['id']; ?></span>
</div>
<div class="message-text">
<?php echo htmlspecialchars($msg['message']); ?>
</div>
<div class="message-time">
<?php echo $msg['created_at']; ?>
</div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="empty-chat">No messages yet</div>
<?php endif; ?>
</div>
<div class="chat-footer">
<form action="process.php" method="POST" class="chat-form">
<input type="text" name="name" placeholder="Your name" required>
<input type="text" name="message" placeholder="Type a message..." required>
<button type="submit" name="send">Send</button>
</form>
<div class="chat-actions">
<form action="process.php" method="POST" class="small-form">
<input type="number" name="id" placeholder="Message ID" required>
<button type="submit" name="delete">Delete</button>
</form>
<form action="process.php" method="POST" class="small-form">
<button type="submit" name="clear" class="clear-btn">Clear Chat</button>
</form>
</div>
<div class="chat-count">
Total Messages: <?php echo count($messages); ?>
</div>
</div>
</div>
</body>
</html>
