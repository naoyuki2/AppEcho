<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$reqId = $_GET['reqId'];
$judge = $_GET['judge'];
$date = new DateTime();
$judge_date = $date->format("Y-m-d");

if($judge == 'accept'){
    RequestAccept($judge_date,$reqId);
    header('Location: ../../pages/admin/AppInsert.php?reqId='.$reqId);
}else{
    RequestDestruction($judge_date,$reqId);
    header('Location: ../../pages/admin/RequestList.php');
}
exit();

function RequestDestruction($judge_date,$reqId) {
    global $pdo;
    $sql = $pdo->prepare('
        update request set 
        status = 2,
        judge_date = ?
        where id = ?;
    ');
    $result = $sql->execute([$judge_date,$reqId]);
}

function RequestAccept($judge_date,$reqId) {
    global $pdo;
    $sql = $pdo->prepare('
        update request set 
        status = 1,
        judge_date = ?
        where id = ?;
    ');
    $result = $sql->execute([$judge_date,$reqId]);
}
?>