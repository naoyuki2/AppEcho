<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

    function getTag(){
        global $pdo;
        $sql = $pdo->query('
            SELECT *
            FROM tag
        ');
        return $sql->fetchAll();
    }
?>

