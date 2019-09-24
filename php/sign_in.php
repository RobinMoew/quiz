<?php
include_once("connection.php");

// Get AJAX datas
$username = $_POST["username"];
$password = $_POST["password"]; 
$c_password = $_POST["c_password"];

// Check fields
if (!$username || !$password || !$c_password) {
  echo 'Some fields are empty !';
  die();
}

// Check passwords match
if ($password != $c_password) {
  echo "Passwords aren't matching";
  die();
}

$db_username = null;

// Get 'usernames' from data base
$sql = $connection->prepare('SELECT login FROM users WHERE login = ?');
$sql->bind_param('s', $username);
$sql->execute();
if ($sql->fetch()) { // if there is a similar username in the data base
  echo 'Username already taken !';
  die();
} else { // else add it to the data base
  $password_hashed = password_hash($password, PASSWORD_DEFAULT);

  $sql = $connection->prepare("INSERT INTO users (login, password) VALUES(?, ?)");
  $sql->bind_param('ss', $username, $password_hashed);
  $sql->execute();

  if ($sql) {
    echo "index.html";
  } else {
    echo "Error";
  }
}

$sql->close();
$connection->close();
?>