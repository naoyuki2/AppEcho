<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$appName = $_POST['AppName'];
$appIcon = $_POST['AppIcon'];
$appDescription = $_POST['AppDescription'];
$appStoreLink = $_POST['AppStoreLink'];
$appPlayLink = $_POST['AppPlayLink'];
$appCategory = $_POST['AppCategory'];
$appKeyword = $_POST['AppKeyword'];

postApp($appName,$appIcon,$appDescription,$appStoreLink,$appPlayLink,$appCategory,$appKeyword);
$appId = getAppId();
header('Location:../../pages/user/AppDetail.php?appId='.$appId);
exit();

function postApp($appName,$appIcon,$appDescription,$appStoreLink,$appPlayLink,$appCategory,$appKeyword) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO app(name,image_url,info,appLink,playLink,category_id,keyword)
            VALUES (?,?,?,?,?,?,?)
        ');
        $result = $sql->execute([$appName,$appIcon,$appDescription,$appStoreLink,$appPlayLink,$appPlayLink,$appCategory,$appKeyword]);

        if(!$result) {
            echo "Insert failed";
        }
    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}

function getAppId(){
    global $pdo;
    $sql = "
        SELECT * FROM app
    ";
    $box = $pdo -> query($sql);
    $appId = $box -> rowCount();
    return $appId;
}
?>