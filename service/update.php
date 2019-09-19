<?php require './model/Member.php'; ?>
<?php require './model/MemberMapper.php'; ?>
<?php require './model/RecordMapper.php'; ?>
<?php
  session_start();
  $mm = new MemberMapper();
  $allmem = $mm->getAll();
  $exist = false;

  foreach ($allmem as $mem) {
    if ($mem->memid != $_SESSION['info'][0]->memid) {
      if ($mem->memname == $_POST['name']) {
        $exist = true;
        $_SESSION['error3'] = "This username is not available";
        break;
      }
      if ($mem->mememail == $_POST['email']) {
        $exist = true;
        $_SESSION['error3'] = "This email address is not available";
        break;
      }
    }
  }

  if (!$exist) {
    $newmem = new Member();
    $newmem->memid = $_SESSION['info'][0]->memid;
    $newmem->memname = cook($_POST['name']);
    $newmem->mememail = cook($_POST['email']);
    $mm->update($newmem);

    $rm = new RecordMapper();
    $rm->update($newmem->memname,$_SESSION['loginname']);

    $_SESSION['loginname'] = $newmem->memname;
    header('location:./profile.php');
  }
  if ($exist) {
    header('location:../ui/ui_updateInfo.php');
  }

 ?>
