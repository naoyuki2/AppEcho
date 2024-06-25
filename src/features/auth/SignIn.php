<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

$isSignIn = false;
$user = findUserByEmail($_POST['email']);
$isSignIn = signIn($user);

if($isSignIn){
    $_SESSION['user'] = [];
    $_SESSION['user']['id'] = $user['id'];
    $_SESSION['user']['image_url'] = $user['icon_image_url'];
    header('Location: ../../pages/user/AppList.php');
}else{
    $_SESSION['signin-error'] = 'メールアドレスまたはパスワードが間違っています';
    header('Location: ../../pages/user/Auth.php');
}

function signIn($user){
    $saltedPassword = $_POST['password'].$user['salt'];
    if(password_verify($saltedPassword ,$user['hashed_password'])) return true;
}

function findUserByEmail($email){
    global $pdo;
    $sql = $pdo->prepare("
        SELECT *
        FROM user
        WHERE email = ?
    ");
    $sql->execute([$email]);
    return $sql->fetch();
}