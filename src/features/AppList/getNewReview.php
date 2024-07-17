<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getNewReview()
{
    $mindate = date('Y-m-d 00:00:00');
    $maxdate = date('Y-m-d 23:59:59');
    global $pdo;
    $sql = $pdo->prepare('
        SELECT app_id
        FROM review
        WHERE post_date BETWEEN ? AND ?
        GROUP BY app_id
    ');
    $sql->execute([$mindate,$maxdate]);

    // keyが"app_id"、valueがその値(取得したID)の形の配列に整形
    $result = array_map(function($item) {
        return $item[0];
    }, $sql->fetchAll());

    return $result;
}