<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

$userId = $_SESSION['user']['id'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$isAnonymous = $_POST['isAnonymous'];

global $pdo;
$select = $pdo->prepare('
    SELECT email
    FROM user
    WHERE NOT(id = ?)
');
$select->execute([$userId]);
$mailList = $select->fetchAll();

foreach ($mailList as $list) {
    if ($email == $list['email']) {
        $_SESSION['error'] = "既に登録されているメールアドレスです";
        header('Location: ../../pages/user/EditProfile');
        exit;
    }
}

if (isset($_FILES['userIcon']) && $_FILES['userIcon']['error'] !== UPLOAD_ERR_NO_FILE) {
    $userIcon = $_FILES['userIcon'];
    $userIconTxt = pathinfo($userIcon['name'], PATHINFO_EXTENSION);
    $timeNow = time();
    $userIconPass = "../../../img/user/" .  $timeNow . "." . $userIconTxt;
    move_uploaded_file($userIcon['tmp_name'], $userIconPass);
}

if (isset($userIconPass)) {
    $update = $pdo->prepare('
        UPDATE user SET name = ?, email = ?, icon_image_url = ?, isAnonymous = ?
        WHERE id = ?
    ');
    $update->execute([$userName, $email, $userIconPass, $isAnonymous, $userId]);
} else {
    $update = $pdo->prepare('
        UPDATE user SET name = ?, email = ?, isAnonymous = ?
        WHERE id = ?
    ');
    $update->execute([$userName, $email, $isAnonymous, $userId]);
}

header('Location: ../../pages/user/profile.php');
