<?php
include_once('connection.php');
header("Access-Control-Allow-Origin: *");

$question = $_POST['question'];
$type = $_POST['type'];
$quiz_name = $_POST['quiz_name'];

$db_quiz_id = null;

if (!empty($question) AND !empty($type) AND !empty($quiz_name)) {
  $sql = $connection->prepare("SELECT id FROM quizs WHERE nom = ?");
  $sql->bind_param('s', $quiz_name);
  $sql->execute();
  $sql->bind_result($db_quiz_id);
  $sql->fetch();
}

if (!empty($question) AND !empty($type) AND !empty($db_quiz_id)) {
  $sql = $connection->prepare("INSERT INTO questions (q_type, question, id_quiz) VALUES (?, ?, ?)");
  $sql->bind_param('ssi', $type, $question, $db_quiz_id);
  $sql->execute();

  if (!$sql) {
    echo "Error: " . $sql->error;
  }

  echo 'Added';
}
$sql->close();
$connection->close();
?>