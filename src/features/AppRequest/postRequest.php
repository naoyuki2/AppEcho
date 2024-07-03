<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

if(isset($_POST['request'])){
$userid = $_SESSION['user']['id'];
$appname = $_POST['request'];

Request($userid,$appname);
header('Location: ../../pages/user/ReviewRequest.php');
}

function Request($userid,$appname){
    global $pdo;
    $sql = $pdo->prepare('
        INSERT INTO request(user_id, app_name)
        VALUES (?,?)
    ');
    $result = $sql->execute([$userid,$appname]);
}