<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getRequestName($reqId)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT app_name
            FROM request
            WHERE id = ?;
        ');
    return $sql->execute([intval($reqId)]);
}