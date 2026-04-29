<?php
ini_set('session.cookie_lifetime', 0);
session_start();

$host = "localhost";
$user = "";
$password = "";
$database = "ChatApp";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
?>
