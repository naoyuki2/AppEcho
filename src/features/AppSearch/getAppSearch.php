<?php
require_once '../../config/db_connect.php';

function getAppSearch()
{
    global $pdo;
    $sql = $pdo->query('
            SELECT id, name
            FROM category
        ');
    return $sql->fetchAll();
}
