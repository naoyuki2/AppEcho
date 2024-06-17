<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

// PDOオブジェクトの設定
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力を検証およびサニタイズ
    $app_name = filter_input(INPUT_POST, 'app_name', FILTER_SANITIZE_STRING);
    $app_description = filter_input(INPUT_POST, 'app_description', FILTER_SANITIZE_STRING);
    $app_link = filter_input(INPUT_POST, 'app_link', FILTER_SANITIZE_URL);
    $play_link = filter_input(INPUT_POST, 'play_link', FILTER_SANITIZE_URL);
    $app_category = filter_input(INPUT_POST, 'app_category', FILTER_VALIDATE_INT);
    $search_keywords = filter_input(INPUT_POST, 'search_keywords', FILTER_SANITIZE_STRING);

    // ファイルアップロードの処理
    if (isset($_FILES['app_icon']) && $_FILES['app_icon']['error'] == UPLOAD_ERR_OK) {
        $app_icon = $_FILES['app_icon'];
        $upload_dir = dirname(__FILE__, 5) . '/uploads/';
        $upload_file = $upload_dir . basename($app_icon['name']);

        // ファイルタイプを検証
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($app_icon['type'], $allowed_types)) {
            die("無効なファイルタイプです。JPEG、PNG、GIFファイルのみが許可されています。");
        }

        // アップロードされたファイルを移動
        if (!move_uploaded_file($app_icon['tmp_name'], $upload_file)) {
            die("ファイルアップロードに失敗しました。");
        }

        postApp($app_name, $upload_file, $app_description, $app_link, $play_link, $app_category, $search_keywords);
    } else {
        die("ファイルアップロードエラー。");
    }

    header('Location: ../../pages/admin/AppInsert.php');
    exit();
}

function postApp($app_name, $app_icon_path, $app_description, $app_link, $play_link, $app_category, $search_keywords) {
    try {
        global $pdo;

        // テーブルが存在することを確認
        $pdo->query("SELECT 1 FROM apps LIMIT 1");

        // 現在の日付を取得
        $upload_date = date('Y-m-d');

        // アプリ情報の挿入
        $sql = $pdo->prepare('
            INSERT INTO apps (name, image_url, info, appLink, playLink, category_id, keyword, upload_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $result = $sql->execute([
            $app_name,
            $app_icon_path,
            $app_description,
            $app_link,
            $play_link,
            $app_category,
            $search_keywords,
            $upload_date
        ]);

        if (!$result) {
            throw new Exception("挿入に失敗しました！");
        }

    } catch (Exception $ex) {
        error_log($ex->getMessage());
        die("エラー：何かが間違っています。後で再試行してください。");
    }
}
?>