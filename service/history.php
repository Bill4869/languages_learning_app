<?php require './model/Record.php'; ?>
<?php require './model/RecordMapper.php'; ?>
<?php
  session_start();
  $rm = new RecordMapper();
  $_SESSION['history'] = $rm->getRecords($_SESSION['loginname']);

  // echo ($_SESSION['history'][0]->recordscore);
  header('location: ../ui/ui_history.php');
  

 ?>
