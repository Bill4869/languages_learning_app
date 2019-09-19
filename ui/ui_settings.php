<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<?php
$lang = ["English","Lao","Thai","Japanese","Spanish","Tajik","Chinese"];
echo '
<h1>Settings</h1>
<div class="panel panel-default">
<div class="panel-heading"><span style="font-weight:bold; font-size:1.5em;">Language</span></div>
<div class="panel-body"><span style="font-size:1.5em;">Your Language</span>
';
echo '
<form class="yrlang">
<div class="form-group">
<select class="form-control" id="yl" >
';
for ($i=0; $i < count($lang); $i++) {
  if ($i + 1 == $_SESSION['settings'][0]->langid) {
    echo '<option value="',$i+1,'" selected>',$lang[$i],'</option>';
  }
  else {
    echo '<option value="',$i+1,'">',$lang[$i],'</option>';
  }
}
echo '
</select>
</div>
</form>
</div>
';
echo '
<div class="panel-body"><span style="font-size:1.5em;">Study Language</span>
<form class="stdlang">
<div class="form-group">
<select class="form-control" id="sl" >
';
for ($j=0; $j < count($lang); $j++) {
  if ($j + 1 == $_SESSION['stdlang'][0]->langid) {
    echo '<option value="',$j+1,'" selected>',$lang[$j],'</option>';
  }
  else {
    echo '<option value="',$j+1,'">',$lang[$j],'</option>';
  }
}
echo '
</select>
</div>
</form>
</div>
</div>
';
 ?>
