<?php require '../service/model/conditions.php'; ?>
<?php
session_start();
if (count($_SESSION['quiznum']) == count($_SESSION['quizlist'])/2) {
  header('location:../ui/ui_quiz.php');
}
session_abort();
?>
<?php require '../service/model/Wordlist.php'; ?>
<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<?php
if (!isset($_SESSION['quiznum'])) {
  $_SESSION['quiznum'] = array();
}
while (1) {
  if(!isset($_SESSION['loginname']) || count($_SESSION['quiznum']) == count($_SESSION['quizlist'])/2) {
    break;
  }
  $ran = rand(0,(count($_SESSION['quizlist'])-1));
  if ($_SESSION['quizlist'][$ran]->langid
      == $_SESSION['stdlang'][0]->langid && (!in_array($ran,$_SESSION['quiznum']))) {
    array_push($_SESSION['quiznum'],$ran);
    echo '<div class="well">';
    if (strpos($_SESSION['quizlist'][$ran]->word, '/') == true) {
        list($word1, $word2) = preg_split('[/]',$_SESSION['quizlist'][$ran]->word);
        echo '<p style="font-size:4em;">',$word1,'</p>';
    }
    else {
      echo '<p style="font-size:4em;">',$_SESSION['quizlist'][$ran]->word,'</p>';
    }
    switch ($_SESSION['stdlang'][0]->langid) {
      case '1':
      case '5':
      echo '<button class="play"><span class="glyphicon glyphicon-volume-up"></span>';
      echo '<audio>';
      echo '<source src="./record/',$_SESSION['stdlang'][0]->yourlang,'/',$_SESSION['quizlist'][$ran]->word,'.wav" type="audio/wav" />';
      echo '</audio>';
      echo '</button>';
        break;

      case '6':
      case '2':
      case '3':
      case '4':
      echo '<button class="play"><span class="glyphicon glyphicon-volume-up"></span>';
      echo '<audio>';
      echo '<source src="./record/',$_SESSION['stdlang'][0]->yourlang,'/',$word2,'.Wav" type="audio/wav" />';
      echo '</audio>';
      echo '</button>';
        break;
      default:
        # code...
        break;
    }

    $annum = rand(0,3);
          $dumarray = array();
          foreach ($_SESSION['quizlist'] as $ans) {
            if ($ans->wordid == $_SESSION['quizlist'][$ran]->wordid &&
            $ans->langid == $_SESSION['settings'][0]->langid) {
              $answer = $ans->word;
              $answerid = $ans->wordid;
            }
          }
          echo '<form action="../service/checkans.php" method="post">';
          echo '<input type="hidden" name="ansid" value=',$_SESSION['quizlist'][$ran]->wordid,'>';
          for ($j=0; $j < 4; $j++) {
            if ($j == $annum) {
              if (strpos($answer,'/') == true) {
                list($answer1,$answer2) = preg_split('[/]',$answer);
                echo '<button class="btn btn-default" type="submit" name="choose" value=',$answerid,'>',$answer1,'</button>';

              }
              else {
                echo '<button class="btn btn-default" type="submit" name="choose" value=',$answerid,'>',$answer,'</button>';
              }
              // echo '<p>',$answer,'</p>';
            }
            else {
              while (1) {
                $dumnum = rand(0,29);
                if (($_SESSION['quizlist'][$dumnum]->langid
                    == $_SESSION['settings'][0]->langid) &&
                    ($_SESSION['quizlist'][$dumnum]->word != $answer)
                    && (!in_array($dumnum,$dumarray))) {
                      // if (count($dumarray)%2==0) {
                      //   echo '<br>';
                      // }
                  if (strpos($_SESSION['quizlist'][$dumnum]->word,'/') == true) {
                    list($dum1,$dum2) = preg_split('[/]', $_SESSION['quizlist'][$dumnum]->word);
                    echo '<button class="btn btn-default" type="submit" name="choose" value=',$_SESSION['quizlist'][$dumnum]->wordid,'>',$dum1,'</button>';

                  }
                  else {
                    echo '<button class="btn btn-default" type="submit" name="choose" value=',$_SESSION['quizlist'][$dumnum]->wordid,'>',$_SESSION['quizlist'][$dumnum]->word,'</button>';

                  }
                  // echo '<p>',$_SESSION['quizlist'][$dumnum]->word,'</p>';
                  array_push($dumarray,$dumnum);
                  break;
                }
                else {
                  continue;
                }
              }
            }
          }
          echo '</form>';
          echo '</div>';
          break;


  }
  else {
    continue;
  }
}
// foreach ($_SESSION as $key=>$val)
//     echo $key." ".$val."<br/>";



// $num = array();
// for ($i=0; $i < count($_SESSION['quizlist'])/2; $i++) {
//   while (1) {
//     $ran = rand(0,29);
//     if ($_SESSION['quizlist'][$ran]->langid
//     == $_SESSION['stdlang'][0]->langid && !(in_array($ran,$num))) {
//       echo '<div class="well">';
//       echo '<h3>',$_SESSION['quizlist'][$ran]->word,'</h3>';
//
//       $annum = rand(0,3);
//       $dumarray = array();
//       foreach ($_SESSION['quizlist'] as $ans) {
//         if ($ans->wordid == $_SESSION['quizlist'][$ran]->wordid &&
//         $ans->langid == $_SESSION['settings'][0]->langid) {
//           $answer = $ans->word;
//         }
//       }
//       for ($j=0; $j < 4; $j++) {
//         if ($j == $annum) {
//           echo '<p>',$answer,'</p>';
//         }
//         else {
//           while (1) {
//             $dumnum = rand(0,29);
//             if (($_SESSION['quizlist'][$dumnum]->langid
//                 == $_SESSION['settings'][0]->langid) &&
//                 ($_SESSION['quizlist'][$dumnum]->word != $answer)
//                 && (!in_array($dumnum,$dumarray))) {
//               echo '<p>',$_SESSION['quizlist'][$dumnum]->word,'</p>';
//               array_push($dumarray,$dumnum);
//               break;
//             }
//             else {
//               continue;
//             }
//           }
//         }
//       }
//
//       array_push($num,$ran);
//       echo '</div>';
//       break;
//     }
//     else {
//       continue;
//     }
//   }
// }
 ?>
<?php require './ui_footer.php'; ?>
