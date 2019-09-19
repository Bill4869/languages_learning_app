<?php require './model/Member.php'; ?>
<?php require './model/MemberMapper.php'; ?>
<?php
  session_start();

  if ($_POST['oldpwd'] == $_POST['cfmoldpwd'] && $_POST['oldpwd'] == $_SESSION['info'][0]->mempass) {
      $mm = new MemberMapper();
      $mm->changepw($_SESSION['info'][0]->memid, cook($_POST['newpwd']));
      header('location:./profile.php');
  }
  else {
    $_SESSION['error4'] = "Incorrect password. Please try again";
    header('location:../ui/ui_putOldpw.php');

  }



 ?>
