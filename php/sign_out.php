<?php
if (isset($_COOKIE['username'])) {
  unset($_COOKIE['username']); 
  setcookie('username', '', time()-3600);
}

echo 'index.html';
?>