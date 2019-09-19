<?php require './model/Mistake.php'; ?>
<?php require './model/MistakeMapper.php'; ?>
<?php require './model/WordMapper.php'; ?>
<?php
  session_start();
  $mism = new MistakeMapper();
  $_SESSION['misLis'] = $mism->getAllbyUser($_SESSION['loginname']);

  $wm = new WordMapper();
  $_SESSION['allWords'] = $wm->All();
  header('location: ../ui/ui_mistake.php');
 ?>
