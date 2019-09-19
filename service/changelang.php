<?php require './model/Lang.php'; ?>
<?php require './model/LangMapper.php'; ?>
<?php
  session_start();
  $yl = new Lang();
  $yl->langid = $_POST['yl'];

  $sl = new Lang();
  $sl->langid = $_POST['sl'];

  $lm = new LangMapper();

  $_SESSION['settings'] = $lm->findById($yl);
  $_SESSION['stdlang'] = $lm->findById($sl);


 ?>
