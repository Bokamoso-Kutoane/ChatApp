<?php
include "db.php";

// Only grab messages where the current time has passed the scheduled arrival
$sql = "SELECT * FROM messages WHERE scheduled_arrival <= CURRENT_TIMESTAMP ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){
        echo '<div class="message-row">
                <div class="message-bubble">
                  <div class="message-top">
                    <span class="username">' . htmlspecialchars($row['name']) . '</span>
                    <span class="msg-index">#' . $row['id'] . '</span>
                  </div>
                  <div class="message-text">' . htmlspecialchars($row['message']) . '</div>
                  <div class="message-times">Sent: ' . $row['time_sent'] . '</div>
                </div>
              </div>';
    }
} else {
    echo '<div class="empty-chat">Patience padawan... pigeons are en route.</div>';
}
?>
