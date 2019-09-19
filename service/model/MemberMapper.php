
<?php
require_once('Member.php');
require_once('functions.php');

  /**
   *
   */
  class MemberMapper
  {

    function insert(Member $mem) {
      try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("insert into members values (?,?,?,?)");
        $stmt->execute([
          null,
          $mem->name,
          $mem->email,
          $mem->pwd
        ]);

      } catch (Exception $e) {
        echo "exception occured!";
            echo $e->getMessage();
            return null;
      }
    }
    function getAll() {
      try {
        $pdo = getPDO();
            $stmt = $pdo->query("select * from members");
            $rows = $stmt->fetchAll(PDO::FETCH_CLASS, 'Member');
            return $rows;
      } catch (Exception $e) {
        echo "exception occured!";
            echo $e->getMessage();
            return null;
      }
    }
    function getInfo($memname) {
      try {
          $pdo = getPDO();
          $stmt = $pdo->prepare("select * from members where memname = :memname");
          $stmt->execute([
                   ':memname' => $memname
          ]);
          $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Member');
          return $row;
      } catch (PDOException $e) {
          echo "exception occured!";
          echo $e->getMessage();
          return null;
      }
    }
    function update(Member $mem) {
      try {
            $pdo = getPDO();
            $stmt = $pdo->prepare(
                    "update members set
                            memname = :memname,
                            mememail = :mememail
                     where memid = :memid");
            $stmt->execute([
                     ':memid' => $mem->memid,
                     ':memname' => $mem->memname,
                     ':mememail' => $mem->mememail
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function changepw($memid, $newpw) {
      try {
            $pdo = getPDO();
            $stmt = $pdo->prepare(
                    "update members set
                            mempass = :newpw
                     where memid = :memid");
            $stmt->execute([
                     ':memid' => $memid,
                     ':newpw' => $newpw
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
  }


 ?>
