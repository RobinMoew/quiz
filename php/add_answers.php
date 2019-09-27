<?php
include_once('connection.php');
header("Access-Control-Allow-Origin: *");

$answers =json_decode($_POST['answers']);

var_dump($answers);

if (isset($_POST['answers'])) {
  $sql = $connection->prepare("INSERT INTO answers(a1, a2, a3, a4) VALUES (?, ?, ?, ?)");
  $sql->bind_param('ssss', $answers);
  $sql->execute();
  $sql->close();
  $connection->close();
} else {
  echo 'Error';
}

?>