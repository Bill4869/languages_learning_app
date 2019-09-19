<?php
require_once('Lang.php');
require_once('functions.php');
require_once('Wordlist.php');

class WordMapper {
  function getWords($topicid, $stdlangid, $yourlangid) {
    try {
      $pdo = getPDO();
      $stmt = $pdo->prepare("select * from words where ((topicid = :topicid1) and ((langid = :stdlang) or (langid = :yourlang)))");
      $stmt->execute([
          ':topicid1' => $topicid,
          ':stdlang' => $stdlangid,
          ':yourlang' => $yourlangid
      ]);
      $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Wordlist');
      return $row;
    } catch (Exception $e) {
      echo "exception occured!";
      echo $e->getMessage();
      return null;
    }

  }
  function All() {
    try {
      $pdo = getPDO();
      $stmt = $pdo->prepare("select * from words");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Wordlist');
      return $row;
    } catch (Exception $e) {
      echo "exception occured!";
      echo $e->getMessage();
      return null;
    }
  }
  function getAll($lang) {
    try {
      $pdo = getPDO();
      $stmt = $pdo->prepare("select * from words where langid = :lang1");
      $stmt->execute([
          ':lang1' => $lang
      ]);
      $row = $stmt->fetchAll();
      return $row;
    } catch (Exception $e) {
      echo "exception occured!";
      echo $e->getMessage();
      return null;
    }
  }
  function transword($lang2, $word) {
    try {
      $pdo = getPDO();
      $stmt = $pdo->prepare("select * from words where (wordid = :id) and (langid = :id2)");
      $stmt->execute([
          ':id' => $word,
          ':id2' => $lang2
      ]);
      $row = $stmt->fetchAll();
      return $row;
    } catch (Exception $e) {
      echo "exception occured!";
      echo $e->getMessage();
      return null;
    }
  }
}
