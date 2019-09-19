<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<?php
if (isset($_SESSION['quiznum'])) {
  $_SESSION['quiznum'] = null;
  $_SESSION['rightansid'] = null;
  $_SESSION['youransid'] = null;
  $_SESSION['score'] = null;
}
echo '<div class="choices">';
foreach ($_SESSION['quiztopics'] as $row) {
  echo '<form action="../service/startquiz.php" method="post">';
  echo '<input type="hidden" name="topicid" value="',$row['topicid'],'">';
  echo '<button type="submit" class="btn btn-default" style="color:#007fff;border-radius:20px;float:left;margin-left:55px;width:320px;">
  <img src="./topics/',$row['topicid'],'.png" class="img-thumbnail"style="width:200px; height:200px;"><br><strong>',
  ucfirst($row[$_SESSION['settings'][0]->yourlang]),'</strong></button>';
  echo '</form>';
}
echo '</div>';
?>
<?php require './ui_footer.php'; ?>
