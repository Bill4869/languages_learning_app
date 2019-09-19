<?php require './model/Member.php'; ?>
<?php require './model/functions.php'; ?>
<?php require './model/MemberMapper.php'; ?>
<?php
  $mem = new Member();
  $mem->name = cook($_POST['name']);
  $mem->email = cook($_POST['email']);
  $mem->pwd = cook($_POST['pwd']);

  $memmap = new MemberMapper();
  $listmem = $memmap->getAll();
  $mem2 = new Member();

  $exist = false;
  session_start();
  foreach ($listmem as $mem2) {
      if ($mem->email == $mem2->mememail || $mem->name == $mem2->memname) {
        $_SESSION['error'] = "This account already exists.";
        $exist = true;
        break;
      }
  }
  if (!$exist) {
    $memmap->insert($mem);
    $_SESSION['success'] = "Your account has been successfully registered";
  }
  header('location:../index.php');


 ?>
