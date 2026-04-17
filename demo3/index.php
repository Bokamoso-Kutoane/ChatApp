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

      <div class="chat-body" id="chat-box">
        </div>

      <div class="chat-footer">
        <form action="process.php" method="POST" class="chat-form">
          <input type="text" name="name" placeholder="Your name" required>
          <input type="text" name="message" placeholder="Type a message..." required>
          <button type="submit" name="send">Send</button>
        </form>
      </div>
    </div>

    <script>
      // The Waiter (Your Silent Wire)
      function fetchMessages() {
        fetch('fetch_messages.php')
          .then(response => response.text())
          .then(data => {
            // Drop the freshly cooked messages onto the table
            document.getElementById('chat-box').innerHTML = data;
          })
          .catch(error => console.error('The waiter tripped:', error));
      }

      // Tell the waiter to check the kitchen every 3 seconds (3000ms)
      setInterval(fetchMessages, 3000);
      
      // Call it immediately on page load so the user doesn't stare at an empty table for 3 seconds
      fetchMessages();
    </script>
  </body>
</html>
