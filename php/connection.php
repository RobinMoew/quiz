<?php
$server = "localhost";
$login = "root";
$password = "";
$bdd = "quizz";

$connection = new mysqli($server, $login, $password, $bdd);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>