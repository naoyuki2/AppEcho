<?php
require_once '../../config/db_connect.php';

    function getTag(){
        global $pdo;
        $sql = $pdo->query('
            SELECT tag.id, tag.name
            FROM tag
        ');
        return $sql->fetchAll();
    }
?>

