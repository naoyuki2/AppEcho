<?php
// セッション情報の読み込み
session_start();
// 管理者フラグ
$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/AppList.css">
    <link rel="stylesheet" href="../../css/AppReviews.css">
    <link rel="stylesheet" href="../../css/AppDetail.css">
    <link rel="stylesheet" href="../../css/Header.css">
    <link rel="stylesheet" href="../../css/AppSearch.css">
    <link rel="stylesheet" href="../../css/AppReviewFilter.css">
    <link rel="stylesheet" href="../../css/AppReviews-modal.css">
</head>

<body>
    <header>
        <div class="Header-left">
            <div class="Header-search">
                <a href="./AppSearch.php"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </div>
        <div class="Header-center">
            <div class="Header-logo">
                <a href="./AppList.php"><img src="../../../img/logo.png"></a>
            </div>
        </div>
        <div class="Header-div"></div>
        <div class="admin">
            <a href="#"><?php echo $isAdmin ? '管理者' : ''; ?></a>
        </div>

    </header>