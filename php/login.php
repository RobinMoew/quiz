<?php
include_once("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

$db_username = null;
$db_password = null;

// Check fields
if (!$username || !$password) {
  echo 'Some fields are empty !';
  die();
}

$sql = $connection ->prepare("SELECT login, password FROM users WHERE login = ?");
$sql->bind_param('s', $username);
$sql->execute();
$sql->bind_result($db_username, $db_password);

if ($sql->fetch()) {
  if (password_verify($password, $db_password)) {
    echo 'quizz_menu.html';
  } else {
    echo 'index.html';
  }
}

$sql->close();
$connection->close();
?>