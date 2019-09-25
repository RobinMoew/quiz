<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {
  echo 'Salut admin !' . ' ' . $_SESSION['id'];
?>

<?php
} else {
    header('HTTP/1.0 403 Forbidden');
    exit();
}

?>