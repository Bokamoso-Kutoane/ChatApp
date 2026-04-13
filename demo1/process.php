<?php
include "db.php";

if (isset($_POST['send'])) {
  $name = trim($_POST['name']);
  $message = trim($_POST['message']);
    if (!empty($name) && !empty($message)) {
      $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
      mysqli_query($conn, $sql);
    }
}

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM messages WHERE id = '$id'";
  mysqli_query($conn, $sql);
}

if (isset($_POST['clear'])) {
  mysqli_query($conn, "DELETE FROM messages");
}

header("Location: index.php");
exit();
?>

