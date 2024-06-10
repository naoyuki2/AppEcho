<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

postTag($_POST['tag_name']);
header('Location:../../pages/admin/TagList.php');
exit();

function postTag($tag_name) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO tag(name)
            VALUES (?)
        ');
        $result = $sql->execute([$tag_name]);

        if (!$result) {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>