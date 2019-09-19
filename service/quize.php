<?php require './model/functions.php'; ?>
<?php
session_start();
$pdo = getPDO();
$stmt = $pdo->query("select * from topics");
$_SESSION['quiztopics'] = $stmt->fetchAll();

header('location:../ui/ui_quiz.php');



 ?>
