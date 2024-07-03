<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getProfile($id)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT user.name, user.email, user.icon_image_url, user.isAnonymous, COUNT(review.id) AS review, COUNT(request.id) AS request
            FROM user
            LEFT JOIN review
            ON user.id = review.user_id
            LEFT JOIN request
            ON user.id = request.user_id
            WHERE user.id = ?
        ');

    $sql->execute([$id]);
    return $sql->fetchAll();
}
