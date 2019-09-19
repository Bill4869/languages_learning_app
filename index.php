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

    <link rel="stylesheet" href="/ui/css/default.css">
    <title></title>
    <script type="text/javascript">
    function translate() {
      $.post('../service/searchword.php', {lang1: $('form.left select').val(),
      lang2: $('form.right select').val(),
      word: $('form.left textarea').val()}, function(result) {
        var word = result.split('/');
        if (result == "" || word[1] == null) {
          $("#read").empty();
        }
        $("form.right textarea").text(word[0]);
        $("#read").text(word[1]);
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
        $("select").change(function(){
          translate();
        });
      });
    </script>
  <!-- <link rel="stylesheet" href="css/default.css"> -->
  </head>
  <body>

    <?php
    session_start();
    ?>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">LANGW<span class="glyphicon glyphicon-globe"></span>RLD</a>
        </div>
        <ul class="nav nav-pill navbar-right">
          <li role="presentation"><a href="./ui/ui_login.php" style="margin-top:5px"><strong>LOG IN</strong></a></li>
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
          echo '<img src="./ui/index/',$i,'.jpg" style="width:100%;height:40%;">';
          echo '</div>';
        }
        else {
          echo '<div class="item" ">';
          echo '<img src="./ui/index/',$i,'.jpg" style="width:100%;height:40%;">';
          echo '</div>';
        }
      }
      echo '</div>';
      echo ' </div>';
     ?>
<div class="container">
  <div id="body">
  <h2>Welcome!</h2>
  <?php
    if (isset($_SESSION['loginname'])) {
      if (isset($_SESSION['settings']) && isset($_SESSION['stdlang'])) {
        header('location: ./ui/ui_choices.php');
      }
      else {
        header('location:./ui/ui_yourlang.php');
      }
    }
    if(isset($_SESSION['error'])) {
      echo '<div class="alert alert-danger">';
      echo ($_SESSION['error']);
      $_SESSION['error'] = null;
      echo '</div>';
    }
    if (isset($_SESSION['success'])) {
      echo '<div class="alert alert-success">';
      echo ($_SESSION['success']);
      $_SESSION['success'] = null;
      echo '</div>';
    }
   ?>
  <form class="form-horizontal" action="./service/memregis.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="usr">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="usr" placeholder="Enter name" name="name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" minlength="6" required>
      </div>
    </div>
    <button style="width:auto;border-radius:20px;" type="submit" class="btn btn-default">Register</button>
  </form>


<?php require './ui/ui_footer.php'; ?>
