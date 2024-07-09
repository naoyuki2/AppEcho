<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getRequest()
{
    global $pdo;
    $sql = $pdo->query('
            SELECT request.id, request.user_id, request.app_name, request.status, user.name AS user_name, user.icon_image_url AS user_icon
            FROM request
            INNER JOIN user
            ON request.user_id = user.id
            WHERE status = 0;
        ');
    return $sql->fetchAll();
}

function getRequestByUserId($userId)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT app_name,status,request_date,judge_date
            FROM request
            WHERE user_id = ?;
        ');

        $sql->execute([$userId]);
        return $sql->fetchAll();
}
