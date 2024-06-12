<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    postApp(
        $_POST['app_name'],
        $_FILES['app_icon'],
        $_POST['app_description'],
        $_POST['store_link'],
        $_POST['store_link'],
        $_POST['app_category'],
        $_POST['search_keywords']
    );
    header('Location:../../pages/admin/AppInsert.php');
    exit();
}

function postApp($app_name, $app_icon, $app_description, $app_link, $play_link, ) {
    try {
        global $pdo;

        //アプリアイコンのアップロード処理
        $target_dir = dirname(_FILE_,5) . '/uploads/';
        $target_icon = $target_dir . basename($app_icon["name"]);
        move_uploaded_file($app_icon["tmp_name"],$target_icon);

        //現在の日付を取得
        $upload_date = date('Y-m-d');

        //アプリ情報の挿入
        $sql = $pdo->prepare('
            INSERT INTO apps (name, image_url, info, appLink, playLink, category_id, keyword, upload_date)
            VALUES (?,?,?,?,?,?,?,?)
        ');
        $result = $sql->execute([
            $app_name,
            $target_icon,
            $app_description,
            $app_link,
            $play_link,
            $app_category,
            $search_keywords,
            $upload_date
        ]);

        if (!$result) {
            echo "Insert failed!";
        }

    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
?>
