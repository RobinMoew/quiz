<?php
if ($_POST) {
  include_once("connection.php");

  $quiz_name = $_POST['quiz_name'];

  $db_quiz_name = null;

  if (!$quiz_name) {
    echo 'Field is empty !';
    die();
  }

  if (!empty($quiz_name)) {
    $sql = $connection->prepare("SELECT nom FROM quizs WHERE nom=?");
    $sql->bind_param('s', $quiz_name);
    $sql->execute();

    if ($sql->fetch()) {
        echo 'Quiz name already taken !';
        exit();
    } else {
      $sql = $connection->prepare("INSERT INTO quizs(nom) VALUES (?)");
      $sql->bind_param('s', $quiz_name);
      $sql->execute();

      if (!$sql) {
        echo "Error";
      }
    }
  }

    $sql->close();
    $connection->close();
  }
?>