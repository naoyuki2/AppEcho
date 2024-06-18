<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$appId = $_GET['appId'];
$name = $_POST['AppName'];
$icon = $_POST['AppIcon'];
$description = $_POST['AppDescription'];
$storelink = $_POST['AppStoreLink'];
$playlink = $_POST['AppPlayLink'];
$category = $_POST['AppCategory'];
$keyword = $_POST['AppKeyword'];

appUpdate($appId, $name, $icon, $description, $storelink, $playlink, $category, $keyword);
header('Location: ../../pages/user/AppDetail.php?appId='.$appId);
exit();

function appUpdate($appId, $name, $icon, $description, $storelink, $playlink, $category, $keyword) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            update app set 
            name = ?,
            image_url = ?,
            info = ?,
            appLink = ?,
            playLink = ?,
            category_id = ?,
            keyword = ?
            where id = ?;
        ');
        $result = $sql->execute([$name, $icon, $description, $storelink, $playlink, $category, $keyword, $appId]);

        if (!$result) {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>
