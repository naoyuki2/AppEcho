<?php
session_start();
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

if (isset($_GET['id'])) {
    if ($_GET['id'] == 1) {
        login();
    } else if ($_GET['id'] == 2) {
        logout();
    }
}

function login()
{
    global $pdo;
    $sql = $pdo->query('
        SELECT *
        FROM admin
        WHERE id = 1
    ');
    $adminList = $sql->fetchAll();

    $password = $_POST['password'];

    foreach ($adminList as $admin) {
        $hashPassword = $password . $admin['salt'];

        if (password_verify($hashPassword, $admin['hashed_password'])) {
            $_SESSION['admin'] = true;
            header('Location: ../../pages/admin/adminTop.php');
        } else {
            $_SESSION['admin'] = false;
            header('Location: ../../pages/admin/login.php');
        }
    }
}

function logout()
{
    unset($_SESSION['admin']);
    header('Location: ../../pages/user/AppList.php');
}
