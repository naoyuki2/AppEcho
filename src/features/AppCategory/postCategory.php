<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

postCategory($_POST['category_name']);
header('Location:../../pages/admin/CategoryList.php');
exit();

function postCategory($category_name) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO category(name)
            VALUES (?)
        ');
        $result = $sql->execute([$category_name]);

        if (!$result) {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>
