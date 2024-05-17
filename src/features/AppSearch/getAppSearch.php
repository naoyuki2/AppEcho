<?php
require_once '../../config/db_connect.php';

function getAppCategory()
{
    global $pdo;
    $sql = $pdo->query('
            SELECT id, name
            FROM category
        ');
    return $sql->fetchAll();
}
