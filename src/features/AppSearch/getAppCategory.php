<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getAppCategory()
{
    global $pdo;
    $sql = $pdo->query('
            SELECT id, name
            FROM category
        ');
    return $sql->fetchAll();
}
