<?php
require_once '../../../config/db_connect.php';

function getAppDetail($appId)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT app.id, app.name, app.image_url, app.info, app.appLink, app.playLink, app.upload_date, category.name AS category_name, COUNT(review.id) AS review, ROUND(AVG(review.star)) AS star
            FROM app
            INNER JOIN category
            ON app.category_id = category.id
            LEFT JOIN review
            ON app.id = review.app_id
            WHERE app.id = ?
        ');

    $sql->execute([$appId]);

    return $sql->fetchAll();
}
