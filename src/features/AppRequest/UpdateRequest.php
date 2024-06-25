<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$reqId = $_GET['reqId'];
$judge = $_GET['judge'];
if($judge == 'accept'){
    RequestAccept($reqId);
    //アプリ投稿画面が完成したらアプリ投稿画面に遷移してください。
    header('Location: ../../pages/user/AppList.php');
}else{
    RequestDestruction($reqId);
    header('Location: ../../pages/admin/RequestList.php');
}
exit();

function RequestDestruction($reqId) {
    global $pdo;
    $sql = $pdo->prepare('
        update request set status = 2
        where id = ?;
    ');
    $result = $sql->execute([$reqId]);
}

function RequestAccept($reqId) {
    global $pdo;
    $sql = $pdo->prepare('
        update request set status = 1
        where id = ?;
    ');
    $result = $sql->execute([$reqId]);
}
?>