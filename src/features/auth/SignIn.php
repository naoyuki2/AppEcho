<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

if(isset($_POST['email'])){
    $mail = $_POST['email'];
    $email = "'$mail'";
    $user;
    login($email);
    if(empty($user)){
        $_SESSION['user'] = false;
        $_SESSION['mail'] = $user['email'];
        header('Location: ../../pages/user/Auth.php');
    }else{
        /*if(isset($_POST['password'])){
            $saltedPassword = $_POST['password'].$user['salt'];
            if(password_verify($saltedPassword ,$user['hashed_password']){
                //$_SESSION['userId'] = $user['id'];
                //header('Location: ../../pages/user/AppList.php');
            }else{
                $_SESSION['user'] = false;
                header('Location: ../../pages/user/Auth.php');
            }
        }*/
    }
}else{
    $_SESSION['user'] = false;
    header('Location: ../../pages/user/Auth.php');
}

function login($email){
    global $pdo;
    $sql = $pdo->prepare("
        SELECT *
        FROM user
        WHERE email = ?
    ");
    $sql->execute([$email]);
    $user = $sql->fetchAll();
}