<?php
    require_once '/home/users/2/verse.jp-aso2201030/web/AppEcho/config/db_connect.php';
    
    function getReviews() {
        global $pdo;
        $sql = $pdo->query('
            SELECT review.id, review.content, review.star, review.post_date, tag.name AS tag_name,tag.color AS tag_color
            FROM review 
            INNER JOIN tag 
            ON review.tag_id = tag.id
        ');
        return $sql->fetchAll();
    }
?>
