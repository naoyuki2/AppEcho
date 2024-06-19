<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
?>

<div class="profile-main">
<!-- 匿名機能 -->
    <div class="profile-flex">
        <div class="profile-pad-r">
            <h3>匿名機能</h3>
        </div>
        <div class="profile-pad-l">
            <!-- 切り替えボタン -->
            <div class="profile-toggle_button">
                <input id="profile-toggle" class="profile-toggle_input" type='checkbox' />
                <label for="profile-toggle" class="profile-toggle_label"/>
            </div>
            <!-- ここまで-->
        </div>
    </div>

<!-- プロフィール画像 -->
    <div class="profile-pad-top">
        <div align="center">
            <img src="" alt="" class="profile-image">
        </div>
    </div>

<!-- ユーザーネーム -->
    <div class="profile-pad-top">
        <div align="center">
            <h3>ユーザーネーム</h3>
        </div>
    </div>

<!-- メールアドレス -->
    <div class="profile-pad-top">
        <div align="center">
            <h3>メールアドレス</h3>
        </div>
    </div>

<!-- 編集ボタン -->
    <div class="profile-pad-top">
        <div align="center">
            <a href="" class="profile-btn">編集</a>
        </div>
    </div>

<!-- 過去レビュー -->
    <div class="profile-pad-top2">
        <div align="center">
            <a href="" class="profile-a">
                <h3>過去のレビューを表示</h3>
            </a>
        </div>
    </div>

<!-- アプリ申請 -->
    <div class="profile-pad-top2">
        <div align="center">
            <h3>レビューしたいアプリが無い？</h3>
            <h3>なら申請しろ！<h3>
        </div>
    </div>
    <div class="profile-pad-top">
        <div align="center">
            <a href="" class="profile-btn">申請</a>
        </div>
    </div>

<!-- アプリ申請状況-->
    <div class="profile-pad-top2">
        <div align="center">
            <a href="" class="profile-a">
                <h3>アプリ申請状況</h3>
            </a>
        </div>
    </div>

</div>

<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>