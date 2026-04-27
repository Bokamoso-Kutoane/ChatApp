<?php
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch messages
$sql = "SELECT * FROM messages WHERE scheduled_arrival <= CURRENT_TIMESTAMP ORDER BY scheduled_arrival DESC";
$result = mysqli_query($conn, $sql);
$messages = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
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
    <div class="chat-header">
        <h2>Bird Noise*</h2>
        <div class="header-info">
            <span>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="chat-body">
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $msg): ?>
                <?php 
                    // Compare sender to current user
                    $is_mine = (strtolower(trim($msg['name'])) === strtolower(trim($_SESSION['username'])));
                    $class = $is_mine ? 'sent' : 'received';
                ?>
                <div class="message-row <?php echo $class; ?>">
                    <div class="message-bubble">
                        <div class="message-top">
                            <span class="username"><?php echo htmlspecialchars($msg['name']); ?></span>
                            <span class="msg-index">via: <?php echo $msg['transportation']; ?></span>
                        </div>
                        <div class="message-text">
                            <?php echo htmlspecialchars($msg['message']); ?>
                        </div>
                        <div class="message-times">
                            <span><?php echo $msg['time_sent']; ?></span>
                            <span class="message-status"><?php echo $msg['status']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; padding-top:20px; color:#888;">The coop is empty...</p>
        <?php endif; ?>
    </div>

    <div class="chat-footer">
        <form action="process.php" method="POST" class="chat-form">
            
            <div class="bird-selector" onclick="myFunction()">
                Messenger Mode: <span id="current-bird">Carrier Pidgeon</span> (Click to change)
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
                <input type="text" name="message" placeholder="Type a message..." required autocomplete="off">
                <button type="submit" name="send">SEND</button>
            </div>
        </form>
    </div>
</div>

<script src="main.js"></script>
</body>
</html>
