<?php
require_once '../components/Header.php';
//require_once '../features/AppDetail/getAppDetail.php';
//$AppList = getAppDetail($_GET['id']);
?>

<?php
//echo '<pre>';
//print_r($AppList);
//echo '</pre>';
?>

<div class="AppDetail-main">
    <div class="AppDetail-pad">

        <div align="center">
            <img src="" alt="" class="AppDetail-ex">
        </div>

        <div align="left">
            <b><p class="AppDetail-midasi">アプリ名</p></b>
        </div>
        <div align="center">
            <p>x</p>
        </div>

        <div align="left">
            <b><p class="AppDetail-midasi">アプリ説明</p></b>
        </div>
        <div align="center">
            <p>appnaiyou</p>
        </div>

        <div align="left">
            <b><p class="AppDetail-midasi">ダウンロード</p></b>
        </div>
        <div align="center">
            <img src="../img/App_Store_Badge_JP_blk_100317.png" alt="" width=120>
            <img src="../img/google-play-badge.png" alt="" width=155>
        </div>

        <div align="left">
            <b><p class="AppDetail-midasi">平均評価</p></b>
        </div>
        <div align="center">
            <i class="fa-solid fa-star fa-3x" style="color: #FFD43B;"></i>
            <i class="fa-regular fa-star fa-3x" style="color: #4b4b4b"></i>
            <i class="fa-regular fa-star fa-3x" style="color: #4b4b4b"></i>
            <i class="fa-regular fa-star fa-3x" style="color: #4b4b4b"></i>
            <i class="fa-regular fa-star fa-3x" style="color: #4b4b4b"></i>
        </div>

        <div class="AppDetail-foot">
            <div class="AppDetail-fl-left">
                <p class="AppDetail-com">100</p>
                <i class="fa-regular fa-comment fa-3x" style="color: #4b4b4b;"></i>
            </div>
            <div class="AppDetail-fl-right">
            <div class="AppDetail-pad-botm">
                <button class="AppDetail-categori">カテゴリ</button>
            </div>
        </div>
        </div>
    </div>
</div>

<?php
    require_once '../components/Footer.php';
?>