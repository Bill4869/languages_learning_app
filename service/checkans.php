<?php require './model/Lang.php'; ?>
<?php require './model/functions.php'; ?>
<?php require './model/Record.php'; ?>
<?php require './model/RecordMapper.php'; ?>
<?php require './model/Wordlist.php'; ?>
<?php require './model/Mistake.php'; ?>
<?php require './model/MistakeMapper.php'; ?>
<?php
    session_start();
    if (!isset($_SESSION['score'])) {
      $_SESSION['score'] = 0;
    }
    if ($_POST['ansid'] == $_POST['choose']) {
      $_SESSION['score']++;
    }
    if (!isset($_SESSION['rightansid'])) {
      $_SESSION['rightansid'] = array();
      $_SESSION['youransid'] = array();
    }
    array_push($_SESSION['rightansid'],$_POST['ansid']);
    array_push($_SESSION['youransid'],$_POST['choose']);
    if (count($_SESSION['quiznum']) < count($_SESSION['quizlist'])/2) {
      header('location: ../ui/ui_startquiz.php');
    }
    else {
      $record = new Record();
      $record->recordmemname = $_SESSION['loginname'];
      $record->recordstdlangid = $_SESSION['stdlang'][0]->langid;
      $record->recordtopicid = $_SESSION['quizlist'][0]->topicid;
      $record->recordscore = $_SESSION['score'].'/'.count($_SESSION['quizlist'])/2;
      $record->recorddate = date("Y-m-d H:i:s");

      $rm = new RecordMapper();
      $rm->save($record);

      $mism = new MistakeMapper();
      $ml = $mism->getAll($_SESSION['loginname'], $_SESSION['stdlang'][0]->langid);
      $mis = new Mistake();
      $mis->mlangid = $_SESSION['stdlang'][0]->langid;
      $mis->mmem = $_SESSION['loginname'];
      for ($i=0; $i < count($_SESSION['youransid']); $i++) {
        if ($_SESSION['youransid'][$i] != $_SESSION['rightansid'][$i]) {
          $exist = false;
          foreach ($ml as $m) {
            if ($m->mwordid == $_SESSION['rightansid'][$i]) {
              $exist = true;
              $mis->mcount = $m->mcount + 1;
              break;
            }
          }
          if ($exist) {
            $mis->mwordid = $_SESSION['rightansid'][$i];
            $mism->increase($mis);
          }
          else {
            $mis->mwordid = $_SESSION['rightansid'][$i];
            $mis->mcount = 1;
            $mism->add($mis);

          }
        }
      }



      header('location: ../ui/ui_result.php');
    }




 ?>
