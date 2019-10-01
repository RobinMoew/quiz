<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <title>Admin</title>
</head>
<body>
  <?php
  if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {
  echo 'Salut admin !';
  ?>
  <div id="message"></div>
  <div id="quizs">
    <button id="add_quiz_name">Add a quiz</button>
  </div>
  <div class="question"></div>
  <script src="../js/admin.js"></script>
</body>
</html>

<?php
} else {
  header('Location:../index.php');
  exit();
}
?>