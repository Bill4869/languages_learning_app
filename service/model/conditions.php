<?php
session_start();
if (!isset($_SESSION['loginname'])) {
  header('location:./ui_login.php');
}
elseif (!isset($_SESSION['settings'])) {
  header('location:./ui_yourlang.php');
}
elseif (!isset($_SESSION['stdlang'])) {
  header('location:./ui_studylang.php');
}
session_abort();
 ?>
