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
    $sql->execute([intval($reqId)]);
    return $sql->fetch();
}