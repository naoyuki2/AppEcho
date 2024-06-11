<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getAppTag()
{
    global $pdo;
    $sql = $pdo->query('
            SELECT id, name
            FROM tag
        ');
    return $sql->fetchAll();
}
