<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery-ui-i18n.min.js"></script>

    <link href="css/bootstrap3_player.css" rel="stylesheet">
    <script src="js/bootstrap3_player.js"></script>

    <link rel="stylesheet" href="/ui/css/default.css">
    <title></title>
    <script type="text/javascript">
    function changeLang() {
      $.post('../service/changelang.php',{yl: $('select#yl').val(),
      sl: $('select#sl').val()});
    }
    function translate() {
      $.post('../service/searchword.php', {lang1: $('form.left select').val(),
      lang2: $('form.right select').val(),
      word: $('form.left textarea').val()}, function(result) {
        var lang = ["english", "lao", "thai", "japanese", "spanish", "tajik", "chinese"];
        var word = result.split('/');
        if (result == "" || word[1] == null) {
          $("#read").empty();
          var sb = "./record/"+lang[$("form.right select").val()-1]+"/"+word[0]+".wav";
        }
        else {
          var sb = "./record/"+lang[$("form.right select").val()-1]+"/"+word[1]+".Wav";
        }
        $("form.right textarea").text(word[0]);
        $("#read").text(word[1]);

        var audio = $("#special");
        $("#spe").attr("src", sb);
        audio[0].pause();
        audio[0].load();
        // audio[0].oncanplaythrough = audio[0].play();
      });
    }
      $(function(){
        $("div.col-sm-4").mouseover(function(){
          $(this).css("opacity","1")
        });
        $("div.col-sm-4").mouseout(function(){
          $(this).css("opacity","0.5")
        });
        $("form.left textarea").keyup(function(){
          translate();
        });
        $("select#lang1").change(function(){
          translate();
        });
        $("select#lang2").change(function(){
          translate();
        });
        $("form.left textarea").keydown(function(){
          translate();
        });
        $("textarea").css("font-size","3em");
        $("button.play").click(function() {
          $("audio", this)[0].play();
        });
        $("select#yl").change(function(){
          changeLang();
        });
        $("select#sl").change(function(){
          changeLang();
        });
      });
    </script>
  <!-- <link rel="stylesheet" href="css/default.css"> -->
  </head>
  <body>

    <?php
    session_start();
      if (!isset($_SESSION['loginname'])) {
        ?>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="../index.php">LANGW<span class="glyphicon glyphicon-globe"></span>RLD</a>
            </div>
             <ul class="nav nav-pill navbar-right">
               <li role="presentation"><a href="./ui_login.php" style="margin-top:5px"><strong>LOG IN</strong></a></li>
             </ul>
           </div>
         </nav>
          <!-- <li><a href="./ui/ui_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
<?php
        echo '<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:40%;margin-top:-20px">';
        echo '<div class="carousel-inner" style="height:100%;">';
          for ($i=0; $i < 4; $i++) {
            if ($i == 0) {
              echo '<div class="item active" >';
              echo '<img src="./index/',$i,'.jpg" style="width:100%;height:40%;">';
              echo '</div>';
            }
            else {
              echo '<div class="item" >';
              echo '<img src="./index/',$i,'.jpg" style="width:100%;height:40%;">';
              echo '</div>';
            }
          }
          echo '</div>';
          echo ' </div>';
      }
      else {
        ?>
        <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="./ui_choices.php">LANGW<span class="glyphicon glyphicon-globe"></span>RLD</a>
        </div>
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"　><?php echo($_SESSION['loginname'])?>
        <span class="caret" ></span></a>
        <ul class="dropdown-menu">
          <li><a href="./ui_choices.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li><a href="../service/profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
          <li><a href="../service/history.php"><span class="glyphicon glyphicon-th-list"></span> History</a></li>
          <li><a href="../service/mistake.php"><span class="glyphicon glyphicon-remove"></span> Mistakes</a></li>
          <li><a href="./ui_settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
          <li><a href="../service/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="jumbotron text-center">
    <!-- <h1>学習言語アプリ</h1> -->
    <h1 style="font-weight:900;">LANGW<span class="glyphicon glyphicon-globe"></span>RLD</h1>
  </div>
        <?php
      }

     ?>
<div class="container">
  <div id="body">
