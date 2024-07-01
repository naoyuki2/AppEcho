<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date = new DateTime();
$appName = $_POST['AppName'];
$appIcon = $_POST['AppIcon'];
$appDescription = $_POST['AppDescription'];
$appStoreLink = $_POST['AppStoreLink'];
$appPlayLink = $_POST['AppPlayLink'];
$appCategory = $_POST['AppCategory'];
$appKeyword = $_POST['AppKeyword'];
$appInsertDate = $date->format("Y-m-d");

postApp($appName,$appIcon,$appDescription,$appStoreLink,$appPlayLink,$appCategory,$appKeyword,$appInsertDate);
$Id = $pdo->lastInsertId();
header('Location:../../pages/user/AppDetail.php?appId='.$Id);
exit();

function postApp($appName,$appIcon,$appDescription,$appStoreLink,$appPlayLink,$appCategory,$appKeyword,$appInsertDate) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO app(name,image_url,info,appLink,playLink,category_id,keyword,upload_date)
            VALUES (?,?,?,?,?,?,?,?)
        ');
        $result = $sql->execute([$appName,$appIcon,$appDescription,$appStoreLink,$appPlayLink,$appCategory,$appKeyword,$appInsertDate]);

        if(!$result) {
            echo "Insert failed";
        }
    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>