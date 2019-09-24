<?php
$json = [];

if (isset($_COOKIE)) {
  if (isset($_COOKIE['username']) AND isset($_COOKIE['id'])) {
    $message = 'Bienvenue !';
  }
} else {
  $redirect = 'index.html';
}

if (isset($message)) {
  $json[] = [
    'message' => $message
  ];
}

if (isset($redirect)) {
  $json[] = [
    'redirect' => $redirect
  ];
}

if (isset($_COOKIE['username'])) {
  $json[] = [
  'username' => $_COOKIE['username'],
  'id' => $_COOKIE['id']
  ];
}

echo json_encode($json);
?>