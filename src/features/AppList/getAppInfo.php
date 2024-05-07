<?php
require_once '/home/users/2/verse.jp-aso2201030/web/AppEcho/config/db_connect.php';

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
