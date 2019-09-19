<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Lang.php'; ?>
<?php require '../service/model/functions.php'; ?>
<?php require '../service/model/Record.php'; ?>
<?php require './ui_header.php'; ?>
<?php
$lang = array("english", "lao", "thai", "japanese", "spanish", "tajik", "chinese");

echo '<h1>History</h1>';
echo '<div class="panel-group" id="accordion">';
for ($i=0; $i < count($lang); $i++) {
  echo '<div class="panel panel-default">';
  echo '<div class="panel-heading">';
  echo '<h2 class="panel-title">
  <a data-toggle="collapse" data-parent="#accordion" href="#collapse',$i+1,'"><span style="font-size:1.5em;">',ucfirst($lang[$i]),'</span></a></h2></div>';
  echo '<div id="collapse',$i+1,'" class="panel-collapse collapse">';
  echo '<div class="panel-body">';

  echo '<table class="table table-striped">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Date</th>';
  echo '<th>Topic</th>';
  echo '<th>Score</th>';
  echo '<tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($_SESSION['history'] as $record) {
    if ($record->recordstdlangid == $i+1) {
      if (!isset($_SESSION['topics'])) {
        $pdo = getPDO();
        $stmt = $pdo->query("select * from topics");
        $_SESSION['topics'] = $stmt->fetchAll();
      }
      echo '<tr>';
      echo '<td>',$record->recorddate,'</td>';
      echo '<td>',ucfirst($_SESSION['topics'][($record->recordtopicid)-1][$_SESSION['settings'][0]->yourlang]),'</td>';
      echo '<td>',$record->recordscore,'</td>';
      echo '</tr>';

    }
  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';
?>
 <?php require './ui_footer.php'; ?>
