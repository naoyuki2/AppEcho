<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';
    
    function getReviews($appId) {
        global $pdo;
        $sql = $pdo->prepare('
            SELECT review.id, review.app_id, review.content, review.star, review.post_date, tag.name AS tag_name,tag.color AS tag_color ,review.tag_id
            FROM review 
            INNER JOIN tag 
            ON review.tag_id = tag.id
            WHERE review.app_id = ?
            ORDER BY review.post_date DESC
        ');
        $sql->execute([$appId]);
        return $sql->fetchAll();
    }

    function getReviewsbytast($appId,$tagId,$star){

        $tags = implode(',', array_fill(0, count($tagId), '?'));
        $stars = implode(',', array_fill(0, count($star), '?'));

        global $pdo;
        $sql = $pdo->prepare("
            SELECT review.id, review.app_id, review.content, review.star, review.post_date, tag.name AS tag_name,tag.color AS tag_color ,review.tag_id
            FROM review 
            INNER JOIN tag 
            ON review.tag_id = tag.id
            WHERE review.app_id = $appId
            AND review.tag_id IN ($tags)
            AND review.star IN ($stars)
            ORDER BY review.post_date DESC
        ");
        $sql->execute(array_merge($tagId,$star));
        return $sql->fetchAll();
    }

    function getReviewsbyta($appId,$tagId){

        $tags = implode(',', array_fill(0, count($tagId), '?'));

        global $pdo;
        $sql = $pdo->prepare("
            SELECT review.id, review.app_id, review.content, review.star, review.post_date, tag.name AS tag_name,tag.color AS tag_color ,review.tag_id
            FROM review 
            INNER JOIN tag 
            ON review.tag_id = tag.id
            WHERE review.app_id = $appId
            AND review.tag_id IN ($tags)
            ORDER BY review.post_date DESC
        ");
        $sql->execute($tagId);
        return $sql->fetchAll();
    }

    function getReviewsbyst($appId,$star){

        $stars = implode(',', array_fill(0, count($star), '?'));

        global $pdo;
        $sql = $pdo->prepare("
            SELECT review.id, review.app_id, review.content, review.star, review.post_date, tag.name AS tag_name,tag.color AS tag_color ,review.tag_id
            FROM review 
            INNER JOIN tag 
            ON review.tag_id = tag.id
            WHERE review.app_id = $appId
            AND review.star IN ($stars)
        ");
        $sql->execute($star);
        return $sql->fetchAll();
    }

    function getTagname($tagId){

        $tags = implode(',', array_fill(0, count($tagId), '?'));

        global $pdo;
        $sql = $pdo->prepare("
            SELECT *
            FROM tag 
            WHERE id IN ($tags)
        ");
        $sql->execute($tagId);
        return $sql->fetchAll();
    }
?>
