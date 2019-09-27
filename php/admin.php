<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {
  echo 'Salut admin !' . ' ' . $_SESSION['id'];
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
  <div>
    <select name="question_type" id="question_type">
      <option selected>MCQ</option>
      <option>Radio</option>
      <option>Response</option>
      <option>Numeric</option>
    </select>
  </div>
  <div>
    <button id="add_question">Add a question</button>
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