<?php require '../service/model/conditions.php'; ?>
<?php
  session_start();
  if (!isset($_SESSION['quiznum'])) {
    header('location:./ui_choices.php');
}
  session_abort();
?>
<?php require '../service/model/Wordlist.php'; ?>
<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<?php
echo '<p><strong>Score :</strong> <span style="color:red; font-size:2em ">',$_SESSION['score'],'/',count($_SESSION['quiznum']),'</span></p>';

echo '<table class="table table-hover">';
echo '<thead>';
echo '<tr>';
echo '<th>Question</th>';
echo '<th>Your answer</th>';
echo '<th>Right answer</th>';
echo '';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

for ($i=0; $i < count($_SESSION['quiznum']); $i++) {
  echo '<tr>';
  echo '<td>',$_SESSION['quizlist'][$_SESSION['quiznum'][$i]]->word,'</td>';
  foreach ($_SESSION['quizlist'] as $word) {
    if ($word->wordid == $_SESSION['youransid'][$i] && $word->langid == $_SESSION['settings'][0]->langid ) {
      echo '<td>',$word->word,'</td>';
      foreach ($_SESSION['quizlist'] as $word2) {
        if ($word2->wordid == $_SESSION['rightansid'][$i] && $word2->langid == $_SESSION['settings'][0]->langid) {
          echo '<td>',$word2->word,'</td>';
          if ($word->wordid == $word2->wordid) {
            echo '<td><span class="glyphicon glyphicon-ok"></span></td>';
          }
          else {
            echo '<td><span class="glyphicon glyphicon-remove"></span></td>';
          }
        }
      }
    }
  }
  echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '<a href="./ui_choices.php"><button style="width:auto" type="button" class="btn btn-success">Next</button></a>';


// $_SESSION['quiznum'] = null;
// $_SESSION['rightansid'] = null;
// $_SESSION['youransid'] = null;
// $_SESSION['score'] = null;

?>
 <?php require './ui_footer.php'; ?>
