<?php
if ($_POST) {
  include_once("php/connection.php");

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
        session_start();
        $_SESSION['id'] = $db_id;
        $_SESSION['username'] = $db_username;
        header('Location:php/quiz_menu.php');
        exit();
      } else {
        header('Location:index.php');
      }
    }

    $sql->close();
    $connection->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Log In</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Pseudo">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Send">
  </form> 
</body>
</html>