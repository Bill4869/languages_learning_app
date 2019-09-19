<?php require '../service/model/conditions.php'; ?>
<?php require '../service/model/Wordlist.php'; ?>
<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<?php
echo '<h2>',ucfirst($_SESSION['topics'][($_SESSION['list'][0]->topicid)-1][$_SESSION['settings'][0]->yourlang]),'</h2>';
echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
echo '<div class="carousel-inner">';
$i = 0;

foreach ($_SESSION['list'] as $word ) {
  if ($i == 0) {
    $class = "item active";
  }
  else {
    $class = "item";
  }
  if ($word->langid == $_SESSION['stdlang'][0]->langid) {
    echo '<div class="',$class,'">';
    $i++;
    if (strpos($word->word, '/') == true) {
      list($array1, $array2) = preg_split('[/]', $word->word);
      echo '<p class="cards">',$array1,'</p>';
      echo '<p style="margin-bottom:0px;margin-top:-30px;font-size:2em;">',$array2,'</p>';
    }
    else {
      echo '<p class="cards" style="margin-bottom:px">',$word->word,'</p>';
    }
    switch ($_SESSION['stdlang'][0]->langid) {
      case '1':
      case '5':
      echo '<button class="play"><span class="glyphicon glyphicon-volume-up"></span>';
      echo '<audio>';
      echo '<source src="./record/',$_SESSION['stdlang'][0]->yourlang,'/',$word->word,'.wav" type="audio/wav" />';
      echo '</audio>';
      echo '</button>';
      break;

      case '6':
      case '2':
      case '3':
      case '4':
      echo '<button class="play"><span class="glyphicon glyphicon-volume-up"></span>';
      echo '<audio>';
      echo '<source src="./record/',$_SESSION['stdlang'][0]->yourlang,'/',$array2,'.Wav" type="audio/wav" />';
      echo '</audio>';
      echo '</button>';
      break;
      default:
      # code...
      break;
    }
    foreach ($_SESSION['list'] as $word2 ) {
      if (($word2->wordid == $word->wordid) && ($word2->langid == $_SESSION['settings'][0]->langid)) {
        if (strpos($word2->word, '/') == true) {
          list($arr1, $arr2) = preg_split('[/]', $word2->word);
          echo '<h1 style="margin-top:150px;">',$arr1,' (',$arr2,')</h1>';
        }
        else {
          echo '<h1 style="margin-top:150px;">',$word2->word,'</h1>';
        }
      }
    }
    echo '</div>';
  }
}
echo '</div>';
echo '<a class="left carousel-control" href="#myCarousel" data-slide="prev">';
  echo '<span class="glyphicon glyphicon-chevron-left"></span>';
  echo '<span class="sr-only">Previous</span>';
  echo '</a>';
  echo '<a class="right carousel-control" href="#myCarousel" data-slide="next">';
    echo '<span class="glyphicon glyphicon-chevron-right"></span>';
    echo '<span class="sr-only">Next</span>';
    echo '</a>';
    echo '</div>';
 ?>
<?php require './ui_footer.php'; ?>
