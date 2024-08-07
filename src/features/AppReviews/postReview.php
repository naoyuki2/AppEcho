<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$appId = $_GET['appId'];
$tagId = $_POST['tagId'];
$content = $_POST['content'];
$star = $_POST['star'];

if (isset($_SESSION['user']['id'])) {
    $userId = $_SESSION['user']['id'];
} else {
    $userId = null;
}

postReviews($appId, $tagId, $content, $star, $userId);
header('Location: ../../pages/user/AppReviews.php?appId='.$appId);
exit();

function postReviews($appId, $tagId, $content, $star, $userId) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO review(app_id, tag_id, content, star, user_id)
            VALUES (?,?,?,?,?)
        ');
        $result = $sql->execute([$appId, $tagId, $content, $star, $userId]);

        if (!$result) {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>
