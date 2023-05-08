<?php

session_start();

if (isset($_POST['logout']) && $_POST['logout'] == 'true') {
  session_destroy();
  header('Location: index.php');
  exit;
} else {
  header('Location: home.php');
  exit;
}
?>
