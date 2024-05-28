<?php
require_once '../../../config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$appId = $_GET['appId'];
// $tagId = $_POST['tagId']; 12行目の1を $tagID に変更してください。
$content = $_POST['content'];
$star = $_POST['star'];

postReviews($appId, 1, $content, $star);

header('Location: ../../pages/AppReviews.php?appId='.$appId);
exit();

function postReviews($appId, $tagId, $content, $star) {
    try {
        echo 'postReview';
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO review(app_id, tag_id, content, star)
            VALUES (?,?,?,?)
        ');
        $result = $sql->execute([$appId, $tagId, $content, $star]);

        if ($result) {
            echo "Insert successful!";
        } else {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>
