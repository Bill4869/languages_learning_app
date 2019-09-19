<?php require './model/functions.php'; ?>
<?php
  session_start();
  $pdo = getPDO();
  $stmt = $pdo->query("select * from topics");
  $_SESSION['topics'] = $stmt->fetchAll();

  header('location:../ui/ui_flashcards.php');
 ?>
