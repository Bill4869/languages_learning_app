<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Member.php'; ?>
<?php require './ui_header.php'; ?>
<?php
if(isset($_SESSION['error4'])) {
  echo '<div class="alert alert-danger">';
  echo ($_SESSION['error4']);
  $_SESSION['error4'] = null;
  echo '</div>';
}
?>
<h1>Change password</h1>
<form action="../service/changepwd.php" method="post">
  <div class="form-group">
    <label for="pwd">Old password:</label>
    <input type="password" class="form-control" id="pwd"  name="oldpwd" minlength="6" required>
  </div>
  <div class="form-group">
    <label for="pwd">Confirm old password:</label>
    <input type="password" class="form-control" id="pwd"  name="cfmoldpwd" minlength="6" required>
  </div>
  <div class="form-group">
    <label for="pwd">New password:</label>
    <input type="password" class="form-control" id="pwd"  name="newpwd" minlength="6" required>
  </div>
  <button style="width:auto;border-radius:20px" type="submit" class="btn btn-default">Confirm</button>
</form>
