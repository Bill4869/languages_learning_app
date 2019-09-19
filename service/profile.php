<?php require './model/MemberMapper.php'; ?>
<?php
  session_start();
  $mm = new MemberMapper();
  $_SESSION['info'] = $mm->getInfo($_SESSION['loginname']);

  header('location:../ui/ui_profile.php');



 ?>
