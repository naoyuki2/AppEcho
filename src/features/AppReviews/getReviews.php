<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';
    
    function getReviews($appId) {
        global $pdo;
        $sql = $pdo->prepare('
            SELECT review.id, review.app_id, review.content, review.star, review.post_date, tag.name AS tag_name,tag.color AS tag_color
            FROM review 
            INNER JOIN tag 
            ON review.tag_id = tag.id
            WHERE review.app_id = ?
            ORDER BY review.post_date DESC
        ');
        $sql->execute([$appId]);
        return $sql->fetchAll();
    }
?>
