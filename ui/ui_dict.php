<?php require '../service/model/conditions.php'; ?>

<?php require '../service/model/Lang.php'; ?>
<?php require './ui_header.php'; ?>
<form class="left">
  <div class="form-group">
    <select class="form-control" id="lang1">


      <?php
      $lang = ["English","Lao","Thai","Japanese","Spanish","Tajik","Chinese"];

      for ($i=0; $i < count($lang); $i++) {
        if ($i + 1 == $_SESSION['settings'][0]->langid) {
          echo '<option value="',$i+1,'" selected>',$lang[$i],'</option>';
        }
        else {
          echo '<option value="',$i+1,'">',$lang[$i],'</option>';
        }
      }

      ?>
    </select>
    <textarea class="form-control" rows="3" id="trans1"></textarea>
  </div>
</form>
<div style="text-align:center; float:left; width:20%;">
  <span class="glyphicon glyphicon-transfer" id="transfer"></span>

</div>
<div style="float:right;width:40%">
  <form class="right">
    <div class="form-group">
      <select class="form-control" id="lang2">

        <?php
        for ($j=0; $j < count($lang); $j++) {
          if ($j + 1 == $_SESSION['stdlang'][0]->langid) {
            echo '<option value="',$j+1,'" selected>',$lang[$j],'</option>';
          }
          else {
            echo '<option value="',$j+1,'">',$lang[$j],'</option>';
          }
        }
        ?>
      </select>
      <textarea class="form-control" rows="3" id="trans2" readonly></textarea>
    </div>
  </form>
  <div id="sound">
    <button class="play"><span class="glyphicon glyphicon-volume-up"></span>
      <audio id="special">
        <source id="spe" src="" type="audio/wav" />
      </audio>
    </button>
  </div>
  <p id="read" style="font-size:2em;"></p>

</div>

<?php require './ui_footer.php'; ?>
