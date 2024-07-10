<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getAppAll(){
    global $pdo;
    $sql = $pdo->query('
            SELECT COUNT(*) AS app_count
            FROM app
        ');
    return $sql->fetch();
}