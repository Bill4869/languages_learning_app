<?php require './model/Member.php'; ?>
<?php require './model/functions.php'; ?>
<?php require './model/MemberMapper.php'; ?>
<?php
  $mem = new Member();
  $mem->memname = cook($_POST['name']);
  $mem->pwd = cook($_POST['password']);

  $mm = new MemberMapper();
  $memlist = $mm->getall();
  $mem2 = new Member();
  $check = false;
  session_start();
  foreach ($memlist as $mem2) {
    if ($mem2->memname == $mem->memname &&
    $mem2->mempass == $mem->pwd) {
      $_SESSION['loginname'] = $mem->memname;
      $check = true;
      break;
    }
  }
  if ($check) {
    header('location:../ui/ui_yourlang.php');
  }
  else {
    $_SESSION['error2'] = "Invalid name or password.";
    header('location:../ui/ui_login.php');

  }




 ?>
