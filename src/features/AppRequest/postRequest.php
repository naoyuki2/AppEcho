<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['request'])){
$userid = $_SESSION['user']['id'];
$appname = $_POST['request'];
$date = new DateTime();
$request_date = $date->format("Y-m-d");

Request($userid,$appname,$request_date);
header('Location: ../../pages/user/AppRequestStatus.php');
}

function Request($userid,$appname,$request_date){
    global $pdo;
    $sql = $pdo->prepare('
        INSERT INTO request(user_id, app_name, request_date)
        VALUES (?,?,?)
    ');
    $result = $sql->execute([$userid,$appname,$request_date]);
}