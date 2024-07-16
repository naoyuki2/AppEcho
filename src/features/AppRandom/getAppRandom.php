<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getAppRandom() {
global $pdo;
$sql = $pdo->query('
    SELECT COUNT(*) AS app_count
    FROM app
');
$appList = $sql->fetch();
return getAppId(rand(1,$appList['app_count']));
}

function getAppId($num) {
global $pdo;
$sql = $pdo->prepare('
    SELECT id
    FROM app
    LIMIT 1
    OFFSET :offset
');
$sql->bindValue(':offset', $num - 1, PDO::PARAM_INT);   // 明示的にPARAM_INTを指定する必要がある
$sql->execute();
$appId = $sql->fetchColumn();
return $appId;
}