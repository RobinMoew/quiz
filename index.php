<?php
if ($_POST) {
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
        session_start();
        $_SESSION['id'] = $db_id;
        $_SESSION['username'] = $db_username;
        header('Location:quiz_menu.php');
        exit();
      } else {
        header('Location:login.php');
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
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Log In</title>
</head>
<body>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Site<span>Quiz</span></div>
		</div>
		<br>
		<div class="login" >
      <form action="" method="POST">
				<input type="text" placeholder="username" name="username"><br>
				<input type="password" placeholder="password" name="password"><br>
        <input id="button" type="submit" value="Login">
        </form>
        <div id="register"><p>Not registered yet? </p> <a href="">  Register</a></div>
        
		</div>
 
</body>
</html>