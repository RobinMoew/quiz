<?php
include_once("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

$db_id = null;
$db_username = null;
$db_password = null;

if (!$username || !$password) {
  echo 'Some fields are empty !';
  die();
}

if (!empty($username)) {
  $sql = $connection->prepare("SELECT id, login, password FROM users WHERE login = ?");
  $sql->bind_param('s', $username);
  $sql->execute();
  $sql->bind_result($db_id, $db_username, $db_password);

  if ($sql->fetch()) {
    if (password_verify($password, $db_password)) {
      setcookie('username', $db_username);
      setcookie('id', $db_id);
      echo 'quiz_menu.html';
      exit();
    } else {
      echo 'index.html';
    }
  }

  $sql->close();
  $connection->close();
}
?>