<?php
  session_start();
  $_SESSION['loginname'] = null;
  $_SESSION['settings'] = null;
  $_SESSION['stdlang'] = null;
  $_SESSION['topics'] = null;
  $_SESSION['history'] = null;
  $_SESSION['info'] = null;
  $_SESSION['quiztopics'] = null;
  $_SESSION['quizlist'] = null;
  $_SESSION['misLis'] = null;
  $_SESSION['allWords'] = null;
  $_SESSION['list'] = null;
  header('location:../index.php');


 ?>
