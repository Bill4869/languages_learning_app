<?php
  session_start();
  if (!isset($_SESSION['loginname'])) {
    header('location:./ui_login.php');

  }
  session_abort();
 ?>
<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<h1>Language you want to study</h1>
<div class="row">
  <?php
  $lang = array("english", "lao", "thai", "japanese", "spanish", "tajik", "chinese");
  for ($i=0; $i < count($lang); $i++) {
    if ($i + 1 == $_SESSION['settings'][0]->langid) {
      continue;
    }
    echo '<div class="col-sm-4">';
    echo '<h3><strong>',$lang[$i],'</strong></h3>';
    echo '<form action="../service/studylang.php" method="post">';
    echo '<input type="hidden" name="langid" value=',$i + 1,'>';
    echo '<input type="image" src="./flag/',$lang[$i],'.png" class="img-rounded" alt="submit"
    width="200" height="150" >';
    echo '</form>';
    echo '</div>';

  }
  ?>
</div>
<ul class="pager">
  <li class="previous"><a href="./ui_yourlang.php">Previous</a></li>
</ul>
<?php require './ui_footer.php'; ?>
