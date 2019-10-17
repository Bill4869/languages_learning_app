<?php

define('DB_DATABASE', 'teamEdb');
define('DB_USERNAME', 'teamEdbuser');
define('DB_PASSWORD', 'teamEdbuser');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);
define('DB_PERSISTENCE', 1);
function getPDO()
{
    static $pdo;
    if (!isset($pdo)) {
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD, 
        array(PDO::ATTR_PERSISTENT=>DB_PERSISTENCE, 
        PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $pdo->setattribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

function cook($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
