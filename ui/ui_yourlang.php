<?php
  session_start();
  if (!isset($_SESSION['loginname'])) {
    header('location:./ui_login.php');

  }
  session_abort();
 ?>
<?php require './ui_header.php'; ?>
<h1>Your Language</h1>
<div class="row">
  <?php
  $lang = array("english", "lao", "thai", "japanese", "spanish", "tajik", "chinese");
  for ($i=0; $i < count($lang); $i++) {
    echo '<div class="col-sm-4">';
    echo '<h3><strong>',$lang[$i],'</strong></h3>';
    echo '<form action="../service/yourlang.php" method="post">';
    echo '<input type="hidden" name="langid" value=',$i + 1,'>';
    echo '<input type="image" src="./flag/',$lang[$i],'.png" class="img-rounded" alt="submit"
    width="200" height="150" >';
    echo '</form>';
    echo '</div>';

  }
  ?>
</div>
<?php require './ui_footer.php'; ?>
