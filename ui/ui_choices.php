<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<div class="choices">
  <?php
  if (isset($_SESSION['quiznum'])) {
    $_SESSION['quiznum'] = null;
    $_SESSION['rightansid'] = null;
    $_SESSION['youransid'] = null;
    $_SESSION['score'] = null;
  }
  echo '<a href="../service/flashcards.php"><button class="btn btn-default" style="color:#007fff;border-radius:20px;"><strong>',$_SESSION["settings"][0]->flashcards,'</strong></button><br>';
  echo '<a href="../service/quize.php"><button class="btn btn-default" style="color:#007fff;border-radius:20px;"><strong>',$_SESSION["settings"][0]->quiz,'</strong></button><br>';
  echo '<a href="./ui_dict.php"><button class="btn btn-default" style="color:#007fff;border-radius:20px;"><strong>',$_SESSION["settings"][0]->dict,'</strong></button><br>';
  echo '<a href="./ui_yourlang.php"><button class="btn btn-default" style="color:#007fff;border-radius:20px;"><strong>',$_SESSION["settings"][0]->changlang,'</strong></button></br>';
   ?>
 </div>
<?php require './ui_footer.php'; ?>
