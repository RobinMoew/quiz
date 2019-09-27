<?php
include_once('connection.php');
header("Access-Control-Allow-Origin: *");

$question = $_POST['question'];
$type = $_POST['type'];

if (isset($question) AND isset($type)) {
  $sql = $connection->prepare("INSERT INTO questions(type, question) VALUES (?, ?)");
  $sql->bind_param('ss', $type, $question);
  $sql->execute();
  $sql->close();
  $connection->close();
  echo 'Added';
} else {
  echo 'Error';
}
?>