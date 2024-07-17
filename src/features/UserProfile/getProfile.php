<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getProfile($id)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT name, email, icon_image_url, isAnonymous
            FROM user
            WHERE user.id = ?
        ');

    $sql->execute([$id]);
    return $sql->fetchAll();
}

function getReview($id)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT COUNT(id) AS review
            FROM review
            WHERE user_id = ?
        ');

    $sql->execute([$id]);
    return $sql->fetch();
}

function getRequest($id)
{
    global $pdo;
    $sql = $pdo->prepare('
            SELECT COUNT(id) AS request
            FROM request
            WHERE user_id = ?
        ');

    $sql->execute([$id]);
    return $sql->fetch();
}