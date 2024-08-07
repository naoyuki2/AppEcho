<?php
// セッション情報の読み込み
session_start();
// 管理者フラグ
$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
$isUser = isset($_SESSION['user']['image_url']);
?>
<?php
$url = $_SERVER['REQUEST_URI'];
$URL = substr($url,19);
if(!isset($_SESSION['user']['id']) || $_SESSION['user']['id'] === ''){
    if(strstr($URL, 'admin') == false){
        if(strstr($URL, 'App') == false){
            if(strstr($URL, 'Auth') == false){
                header('Location: Auth.php');  
                exit;
            }
        }
    }
}
if(!isset($_SESSION['admin']) || $_SESSION['admin'] === ''){
    if(strstr($URL, 'user') == false){
        if(strstr($URL, 'login') == false){
            header('Location: login.php');  
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../../css/AppList.css">
    <link rel="stylesheet" href="../../css/AppReviews.css">
    <link rel="stylesheet" href="../../css/AppDetail.css">
    <link rel="stylesheet" href="../../css/Header.css">
    <link rel="stylesheet" href="../../css/AppSearch.css">
    <link rel="stylesheet" href="../../css/AppReviewFilter.css">
    <link rel="stylesheet" href="../../css/AppReviews-modal.css">
    <link rel="stylesheet" href="../../css/Auth.css">
    <link rel="stylesheet" href="../../css/AppRequest.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/ReviewHistory.css">
    <link rel="stylesheet" href="../../css/AppRequestStatus.css">
    <link rel="stylesheet" href="../../css/ReviewRequest.css">
    <link rel="stylesheet" href="../../css/EditProfile.css">
</head>

<body>
    <header>
        <div class="Header-wrap">

            <div class="Header-left">
                <div class="Header-search">
                    <a href="./AppSearch.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>

            <div class="Header-center">
                <div class="Header-logo">
                    <a href="<?php echo $isAdmin ? '../user/AppList.php' : './AppList.php'; ?>"><img src="../../../img/logo.png"></a>
                </div>
            </div>

            <div class="Header-right">
                <div class="Header-user">
                    <?php echo $isUser
                        ? '<a href="../user/profile.php"><img class="Header-user-icon" src="' . $_SESSION['user']['image_url'] . '"></a>'
                        : '<a href="../user/Auth.php"><i class="fa-solid fa-right-to-bracket fa-xl Header-login-icon"></i></a>';
                    ?>
                </div>
            </div>
            <div class="admin">
                <a href="../admin/adminTop.php"><?php echo $isAdmin ? '管理者' : ''; ?></a>
            </div>
        </div>
    </header>