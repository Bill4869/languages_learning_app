<?php
  session_start();
  if (isset($_SESSION['loginname'])) {
    header('location:./ui_choices.php');
  }
  session_abort();
 ?>
<?php require './ui_header.php'; ?>

<div class="container">
  <h2>Welcome!</h2>
  <?php

  if(isset($_SESSION['error2'])) {
    echo '<div class="alert alert-danger">';
    echo ($_SESSION['error2']);
    $_SESSION['error2'] = null;
    echo '</div>';
  }

   ?>
  <form class="form-horizontal" action="../service/login.php" method="post">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="name" placeholder="Name" required>
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
    </div>

    <button style="width:auto;margin-top:20px;border-radius:20px;" type="submit" class="btn btn-default" style="margin-top:30px;">Log in</button>
  </form>
</div>


<?php require './ui_footer.php'; ?>
