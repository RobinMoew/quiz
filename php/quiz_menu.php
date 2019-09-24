<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quiz Menu</title>
</head>
<body>
  <p>Bonjour <?php echo $_SESSION['username'] ?></p>
  <?php 
  if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {
  echo '<form action="admin.php"><input type="submit" value="Admin"></form>';
  }
  ?>
  <form action="sign_out.php"><input type="submit" value="Deconnexion"></form>
</body>
</html>