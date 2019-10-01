<?php
if ($_POST) {
  include_once("connection.php");

  $username = $_POST["username"];
  $password = $_POST["password"]; 
  $c_password = $_POST["c_password"];

  // Check fields
  if (!$username || !$password || !$c_password) {
    echo 'Some fields are empty !';
  }

  // Check passwords match
  if ($password != $c_password) {
    echo "Passwords aren't matching";
  }

  $db_username = null;

  // Get 'usernames' from data base
  $sql = $connection->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
  $sql->bind_param('s', $username);
  $sql->execute();
  if ($sql->fetch()) { // if there is a similar username in the data base
    echo 'Username already taken !';
    die();
  } else { // else add it to the data base
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = $connection->prepare("INSERT INTO users (pseudo, password) VALUES(?, ?)");
    $sql->bind_param('ss', $username, $password_hashed);
    $sql->execute();

    if ($sql) {
      header('Location:index.php');
    } else {
      echo "Error";
    }
  }

  $sql->close();
  $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign In</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Pseudo"></input>
    <input type="password" name="password" placeholder="Password"></input>
    <input type="password" name="c_password" placeholder="Confirm password"></input>
    <input type="submit" value="Send">
  </form>
</body>
</html>