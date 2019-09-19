<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Member.php'; ?>
<?php require '../service/model/Record.php'; ?>
<?php require '../service/model/RecordMapper.php'; ?>
<?php require './ui_header.php'; ?>
<?php
echo '<h1><span style="float:left;">Profile</span></h1>';
echo '<a href="./ui_updateInfo.php" ><button style="margin:10px 0px 25px 10px;"><span class="glyphicon glyphicon-pencil"></span></button></a>';
echo '<div class="panel panel-default">';
echo '<div class="panel-heading"><span style="font-weight:bold; font-size:1.5em;">Name</span></div>';
echo '<div class="panel-body"><span style="font-size:1.5em;">',$_SESSION['info'][0]->memname,'</span></div>';
echo '<div class="panel-heading"><span style="font-weight:bold;font-size:1.5em;">Email</span></div>';
echo '<div class="panel-body"><span style="font-size:1.5em;">',$_SESSION['info'][0]->mememail,'</span></div>';
echo '</div>';
echo '<a href="./ui_putOldpw.php" style="font-size:1.3em">Change password</a>';

echo '<div style="width:50%;float:right;">';
echo '<h1>Percentile</h1>';
$rm = new RecordMapper();
$_SESSION['history'] = $rm->getRecords($_SESSION['loginname']);

$lang = array("english", "lao", "thai", "japanese", "spanish", "tajik", "chinese");

for ($i=0; $i < count($lang); $i++) {
  echo '<h3>',ucfirst($lang[$i]),'</h3>';
  $percent = 0;
  $time = 0;
  $total = 0;
  foreach ($_SESSION['history'] as $record) {
    if ($record->recordstdlangid == $i + 1) {
      list($num1,$num2) = preg_split('[/]', $record->recordscore);
      $total = intval($num2);
      $percent += intval($num1);
      $time++;
    }
  }
  if ($percent != 0) {
    $percent = floor(($percent / ($total*$time))*100);
  }
  echo '<div class="progress">';
  echo '<div class="progress-bar" role="progressbar" aria-valuenow="',$percent,'" aria-valuemin="0" aria-valuemax="100" style="width:',$percent,'%;font-size:1.5em;">
  ',$percent,'%</div>';
  echo '</div>';
}
echo '</div>';
echo '<div style="width:50%;">';
echo '<canvas id="myCanvas" width="600" height="400"></canvas>';
echo '
<script>
var canvas = document.getElementById("myCanvas");
var context = canvas.getContext("2d");
var centerX = (canvas.width / 2);
var centerY = canvas.height / 2;

var radius = 0;
context.beginPath();

for (var i = 2; i <= 10; i+=2) {
  radius = i * 10;
  context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
  // context.fillStyle = "white";
  // context.fill();
  context.strokeStyle= "#bfc9ca";
  context.stroke();

}
var lang = ["English", "Lao", "Thai", "Japanese", "Spanish", "Tajik", "Chinese"];
var col = ["#e74c3c", "#8e44ad", "#1abc9c", "#2980b9", "#eb984e", "#f1c40f", "green"];
for (var j = 0; j < 7; j++) {
  context.beginPath();
  var angle = 0 + (50 * j);
  angle *= Math.PI / 180;
  var x = (150*(Math.cos(angle))) + centerX;
  var y = (150*(Math.sin(angle))) + centerY;
  context.strokeStyle = col[j];
  context.moveTo(centerX, centerY);
  context.lineTo(x,y);
  context.stroke();

  context.arc(x, y, 5, 0, 2 * Math.PI, false);
  context.fillStyle = col[j];
  context.fill();

  if (y > 200) {
    y += 25;
  }
  else {
    y -= 15;
  }

  context.font = "15pt Caliri";
  context.textAlign = "center";
  context.fillStyle = col[j];
  context.fillText(lang[j], x, y);
}

</script>
';
echo '
<script>
  context.beginPath();
</script>

';
for ($i=0; $i < count($lang); $i++) {
  $percent = 0;
  $time = 0;
  $total = 0;
  foreach ($_SESSION['history'] as $record) {
    if ($record->recordstdlangid == $i + 1) {
      list($num1,$num2) = preg_split('[/]', $record->recordscore);
      $total = intval($num2);
      $percent += intval($num1);
      $time++;
    }
  }
  if ($percent != 0) {
    $percent = floor(($percent / ($total*$time))*100);
  }
  echo '<script>';
    echo '
    var canvas = document.getElementById("myCanvas");
    var context = canvas.getContext("2d");
    var centerX = (canvas.width / 2);
    var centerY = canvas.height / 2;

    var angle = 0 + (50 * ',$i,');
    angle *= Math.PI / 180;
    var x = (',$percent,'*(Math.cos(angle))) + centerX;
    var y = (',$percent,'*(Math.sin(angle))) + centerY;
    if (',$i,' == 0) {
      context.moveTo(x,y);
    }
    else {
      context.lineTo(x,y);
    }
    ';
    echo '</script>';
  }
  echo '
  <script>
    context.closePath();
    context.fillStyle = "#34495e";
    context.fill();
  </script>
  ';
  echo '</div>';

 ?>
