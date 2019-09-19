<?php require './model/WordMapper.php'; ?>
<?php
  $wm = new WordMapper();
  $all = $wm->getAll($_POST['lang1']);

  $result = "";
  foreach ($all as $word) {
    list($word1, $word2) = preg_split('[/]',$word['word']);
    if ($word1 == ucfirst(strtolower($_POST['word'])) || $word2 === strtolower($_POST['word'])) {
      $wordid = $word['wordid'];
    }
  }
  if(isset($wordid)) {
    $result = $wm->transword($_POST['lang2'],$wordid);
    echo $result[0]['word'];
  }



 ?>
