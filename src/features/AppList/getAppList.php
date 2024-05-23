<?php
require_once '../../config/db_connect.php';

function getAppList()
{
    global $pdo;
    $sql = $pdo->query('
            SELECT app.id, app.name, app.image_url, app.keyword, category.name AS category_name
            FROM app
            INNER JOIN category
            ON app.category_id = category.id
        ');
    return $sql->fetchAll();
}

function getAppListByParams($params)
{
    if (!empty($params) && !empty($params[0])) {
        $flatArray = [];

        if (is_array($params[0])) { // 二次元配列の際は一次元配列に変換、一次元配列の際はそのまま
            foreach ($params as $param) {
                $flatArray = array_merge($flatArray, $param);
            }
        } else {
            $flatArray = $params;
        }

        $placeholders = implode(',', array_fill(0, count($flatArray), '?'));    // 配列の値だけをカンマで連結、IN句で使用できる形にする

        global $pdo;
        $sql = $pdo->prepare("
            SELECT app.id, app.name, app.image_url, app.keyword, category.name AS category_name
            FROM app
            INNER JOIN category
            ON app.category_id = category.id
            WHERE app.id IN ($placeholders)
        ");

        $sql->execute($flatArray);  // 配列を$placeholdersに渡す

        return $sql->fetchAll();
    } else {
        return 0;
    }
}
