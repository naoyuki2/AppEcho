<?php
require_once '../../../config/db_connect.php';

    function getTag(){
        global $pdo;
        $sql = $pdo->query('
            SELECT *
            FROM tag
        ');
        return $sql->fetchAll();
    }
?>

