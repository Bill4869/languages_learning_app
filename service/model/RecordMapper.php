<?php
require_once('Record.php');
require_once('functions.php');

class RecordMapper {
  function getRecords($memname) {
    try {
      $pdo = getPDO();
      $stmt = $pdo->prepare("select * from records where (recordmemname = :memname) order by recorddate DESC");
      $stmt->execute([
               ':memname' => $memname
      ]);
      $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Record');
      return $row;
    } catch (Exception $e) {
      echo "exception occured!";
      echo $e->getMessage();
      return null;
    }

  }

  function save(Record $record) {
    try {
      $pdo = getPDO();
      $stmt = $pdo->prepare("insert into records values (?,?,?,?,?,?)");
      $stmt->execute([
        null,
        $record->recordmemname,
        $record->recordstdlangid,
        $record->recordtopicid,
        $record->recordscore,
        $record->recorddate
      ]);

    } catch (Exception $e) {
      echo "exception occured!";
          echo $e->getMessage();
          return null;
    }
  }
  function update($newname,$oldname) {
    try {
          $pdo = getPDO();
          $stmt = $pdo->prepare(
                  "update records set
                          recordmemname = :newname
                   where recordmemname = :oldname");
          $stmt->execute([
                   ':newname' => $newname,
                   ':oldname' => $oldname
          ]);
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
  }
}

 ?>
