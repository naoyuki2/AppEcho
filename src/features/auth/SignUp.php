<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

$userName = $_POST['signUpUserName'];
$email = $_POST['signUpEmail'];
$password = $_POST['signUpPassword'];

global $pdo;

$selectSql = $pdo->query('
    SELECT email
    FROM user
');

$mailList = $selectSql->fetchAll();

foreach ($mailList as $list) {
    if ($email == $list['email']) {
        $_SESSION['error'] = "既に登録されているメールアドレスです";
        header('Location: ../../pages/user/Auth.php?signUp=true');
        exit;
    }
}

$salt = substr(base_convert(hash('sha256', uniqid()), 16, 36), 0, 20);
$hashed_password= password_hash($password.$salt, PASSWORD_DEFAULT);

try {
    $insertSql = $pdo->prepare('
        INSERT INTO user (name, hashed_password, salt, email) VALUES (?, ?, ?, ?)
    ');

    $insertSql->execute([$userName, $hashed_password, $salt, $email]);
} catch (PDOException $e) {
    $_SESSION['error'] = "エラーが発生しました\n". $e->getMessage();
    header('Location: ../../pages/user/Auth.php?signUp=true');
    exit;
}

unset($_SESSION['error']);
$userId = $pdo->lastInsertId();
$_SESSION['user']['id'] = $userId;
$_SESSION['user']['image_url'] = "../../../img/user.png";

header('Location: ../../pages/user/AppList.php');