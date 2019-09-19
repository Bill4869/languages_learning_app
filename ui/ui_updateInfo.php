<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Member.php'; ?>
<?php require './ui_header.php'; ?>
<?php
if(isset($_SESSION['error3'])) {
  echo '<div class="alert alert-danger">';
  echo ($_SESSION['error3']);
  $_SESSION['error3'] = null;
  echo '</div>';
}
?>
<form class="form-horizontal" action="../service/update.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="usr">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usr" placeholder="<?php echo($_SESSION['info'][0]->memname)   ?>" name="name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="<?php echo($_SESSION['info'][0]->mememail)   ?>" name="email" required>
    </div>
  </div>
  <button style="width:auto;border-radius:20px" type="submit" class="btn btn-default">Update</button>
</form>
