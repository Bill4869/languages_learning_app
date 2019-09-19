<?php require './model/Lang.php'; ?>
<?php require './model/LangMapper.php'; ?>
<?php require './model/Wordlist.php'; ?>
<?php require './model/WordMapper.php'; ?>
<?php
  session_start();
  $wm = new WordMapper();
  $_SESSION['quizlist'] = $wm->getWords($_POST['topicid'],
                      $_SESSION['stdlang'][0]->langid,
                      $_SESSION['settings'][0]->langid);
  // echo (count($_SESSION['quizlist']));
  // echo ($_POST['topicid']);
  // echo ($_SESSION['stdlang'][0]->langid);
  // echo ($_SESSION['settings'][0]->langid);
  //
  // echo ($_SESSION['quizlist'][0]->word);
  header('location: ../ui/ui_startquiz.php');
 ?>
