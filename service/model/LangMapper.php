<?php
require_once('Lang.php');
require_once('functions.php');

class LangMapper {
    function findById(Lang $lang) {
        try {
            $pdo = getPDO();
            $stmt = $pdo->prepare("select * from settings where langid = :langid");
            $stmt->execute([
                     ':langid' => $lang->langid
            ]);
            $row = $stmt->fetchAll(PDO::FETCH_CLASS, 'Lang');
            return $row;
        } catch (PDOException $e) {
            echo "exception occured!";
            echo $e->getMessage();
            return null;
        }
    }
    // function getAll() {
    //     try {
    //         $pdo = getPDO();
    //         $stmt = $pdo->query("select * from pro_cat");
    //         $rows = $stmt->fetchAll(PDO::FETCH_CLASS, 'ProCat');
    //         return $rows;
    //     } catch (PDOException $e) {
    //         echo "exception occured!";
    //         echo $e->getMessage();
    //         return null;
    //     }
    // }

}
