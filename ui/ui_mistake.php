<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Mistake.php'; ?>
<?php require '../service/model/Wordlist.php'; ?>
<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <ul class="nav nav-tabs nav-pills" id="mistab">
      <li class="active"><a data-toggle="pill" href="#tab1">English</a></li>
      <li><a data-toggle="pill" href="#tab2">Lao</a></li>
      <li><a data-toggle="pill" href="#tab3">Thai</a></li>
      <li><a data-toggle="pill" href="#tab4">Japanese</a></li>
      <li><a data-toggle="pill" href="#tab5">Spanish</a></li>
      <li><a data-toggle="pill" href="#tab6">Tajik</a></li>
      <li><a data-toggle="pill" href="#tab7">Chinese</a></li>
    </ul>
  </div>
  <div class="panel-body" style="text-align:center;">
    <!-- <button type="button" class="btn btn-default">
    <div class="panel-body">hey</div>
  </button> -->
  <div class="tab-content">
    <?php
    $lang = ["english","lao","thai","japanese","spanish","tajik","chinese"];

    // foreach ($_SESSION['misLis'] as $mis) {
    //   echo '<p>',$mis->mwordid,'</p>';
    // }

    // foreach ($_SESSION['allWords'] as $word) {
    //   echo '<p>',$word->word,'</p>';
    // }
    $count = 0;
    for ($i=1; $i < 8; $i++) {
      if ($i == 1) {
        echo '
        <div id="tab',$i,'" class="tab-pane fade in active">
        ';
      }
      else {
        echo '
        <div id="tab',$i,'" class="tab-pane fade">
        ';
      }
      foreach ($_SESSION['misLis'] as $mis) {
        if ($mis->mlangid == $i) {
          echo '<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#',$count,'"
          style="font-size:1.5em;margin:10px;width:340px;;">';
          echo '

          <div class="panel-body">Wrong : ',$mis->mcount,' Time(s)</div>

          ';
          foreach ($_SESSION['allWords'] as $word) {
            if ($word->wordid == $mis->mwordid && $word->langid == $mis->mlangid) {
              if (strpos($word->word, '/') == true) {
                list($word1,$word2) = preg_split('[/]', $word->word);
                echo '
                <div class="panel-body">',$word1,'</div>
                ';
              }
              else {
                echo '
                <div class="panel-body">',$word->word,'</div>

                ';
              }
              echo '</button>';
              echo '
              <div class="modal fade" id="',$count,'" role="dialog">
                <div class="modal-dialog">

                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <h1>',(isset($word1))? $word1:$word->word,'</h1>
                      <h3>',(isset($word2))? $word2:"",'</h3>';

                      if (isset($word2)) {
                        echo '<button class="play" style="font-size:1.5em;"><span class="glyphicon glyphicon-volume-up"></span>';
                          echo '<audio>';
                            echo '<source src="./record/',$lang[$word->langid - 1],'/',$word2,'.Wav" type="audio/wav" />';
                              echo '</audio>';
                              echo '</button>';
                            }
                            else {
                              echo '<button class="play" style="font-size:1.5em;"><span class="glyphicon glyphicon-volume-up"></span>';
                                echo '<audio>';
                                  echo '<source src="./record/',$lang[$word->langid - 1],'/',$word->word,'.wav" type="audio/wav" />';
                                    echo '</audio>';
                                    echo '</button>';
                                  }

                                  echo '
                                </div>
                                <div class="modal-footer" style="text-align:center;">
                                  ';
                                  foreach ($_SESSION['allWords'] as $word3) {
                                    if ($word3->wordid == $word->wordid && $word3->langid == $_SESSION['settings'][0]->langid) {
                                      echo '<h3>',$word3->word,'</h3>';
                                      break;
                                    }
                                  }
                                  echo '
                                </div>
                              </div>

                            </div>
                          </div>
                          ';

                        }
                        $word1 = null;
                        $word2 = null;
                      }
                      $count++;
                    }

                  }
                  echo '</div>';
                  echo '

                  ';
                }
                ?>
              </div>
            </div>
          </div>
<?php
