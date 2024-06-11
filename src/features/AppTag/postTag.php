<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// # を削除
$tagColorWithoutHash = preg_replace('/#/', '', $_POST['tag_color']);
echo $tagColorWithoutHash;


postTag( $_POST['tag_name'] , $tagColorWithoutHash );
header('Location:../../pages/admin/TagList.php');
exit();

function postTag($tag_name , $tag_color) {
    try {
        global $pdo;
        $sql = $pdo->prepare('
            INSERT INTO tag(name, color)
            VALUES (?,?)
        ');
        $result = $sql->execute([$tag_name , $tag_color]);

        if (!$result) {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>