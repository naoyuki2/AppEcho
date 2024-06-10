<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

global $pdo;
$sql = $pdo->query('
    SELECT *
    FROM admin
    WHERE id = 1
');
$adminList = $sql->fetchAll();

$password = $_POST['password'];

foreach ($adminList as $admin) {
    $hashPassword = $password. $admin['salt'];

    if (password_verify($hashPassword, $admin['hashed_password'])) {
        $_SESSION['admin'] = true;
        header('Location: ../../pages/admin/adminTop.php');
    } else {
        $_SESSION['admin'] = false;
        header('Location: ../../pages/admin/login.php');
    }
}