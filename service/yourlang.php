<?php require './model/Lang.php'; ?>
<?php require './model/LangMapper.php'; ?>
<?php
session_start();
  $lang = new Lang();
  $lang->langid = $_POST['langid'];
  $lm = new LangMapper();
  $_SESSION['settings'] = $lm->findById($lang);
  header('location: ../ui/ui_studylang.php');

 ?>