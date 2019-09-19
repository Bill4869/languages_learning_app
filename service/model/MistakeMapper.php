<?php
require_once('Mistake.php');
require_once('functions.php');

  class MistakeMapper {
    function getAll($memname, $langid) {
      try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("select * from mistakes where mmem = :memname and mlangid = :langid");
        $stmt->execute([
            ':memname' => $memname,
            ':langid' => $langid
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Mistake');
        return $row;
      } catch (Exception $e) {
        echo "exception occured!";
        echo $e->getMessage();
        return null;
      }
    }
    function getAllbyUser($memname) {
      try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("select * from mistakes where mmem = :memname order by mcount desc");
        $stmt->execute([
            ':memname' => $memname
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Mistake');
        return $row;
      } catch (Exception $e) {
        echo "exception occured!";
        echo $e->getMessage();
        return null;
      }
    }

    function increase(Mistake $mistake) {
      try {
            $pdo = getPDO();
            $stmt = $pdo->prepare(
                    "update mistakes set
                            mcount = :count
                     where mwordid = :wordid and mlangid = :langid and mmem = :name");
            $stmt->execute([
                    ':count' => $mistake->mcount,
                     ':wordid' => $mistake->mwordid,
                     ':langid' => $mistake->mlangid,
                     ':name' => $mistake->mmem
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function add(Mistake $m) {
      try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("insert into mistakes values (?,?,?,?)");
        $stmt->execute([
          $m->mwordid,
          $m->mlangid,
          $m->mcount,
          $m->mmem
        ]);

      } catch (Exception $e) {
        echo "exception occured!";
            echo $e->getMessage();
            return null;
      }
    }
  }
 ?>
