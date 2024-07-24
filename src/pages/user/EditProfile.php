<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/UserProfile/getProfile.php';

if (empty($_SESSION['user']['id'])) {
?>
    <p class="profile-error">ログインしてください！</p>
<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
    exit;
}

$userId = $_SESSION['user']['id'];
$profiles = getProfile($userId);

foreach ($profiles as $profile) {
?>

    <form action="../../features/UserProfile/editProfile.php" method="post" enctype="multipart/form-data" name="EditProfile-form">
        <div class="EditProfile-main">
            <div class="EditProfile-mainInfo">
                <!-- ユーザーアイコン -->
                <div class="EditProfile-pad-top">
                    <p class="EditProfile-subTitle">ユーザーアイコン</p>
                    <div align="center">
                        <input type="file" name="userIcon" id="file" onchange="userIconPrev(this)" class="EditProfile-userIcon" accept="img/*">
                        <img class="EditProfile-userIcon-preview" id="preview">
                    </div>
                </div>

                <!-- ユーザーネーム -->
                <div class="EditProfile-pad-top">
                    <p class="EditProfile-subTitle">ユーザーネーム</p>
                    <div align="center">
                        <input type="text" name="userName" value="<?php echo $profile['name'] ?>" id="EditProfile-userName" class="EditProfile-input" size="30" placeholder="20文字以内">
                    </div>
                </div>

                <!-- メールアドレス -->
                <div class="EditProfile-pad-top">
                    <p class="EditProfile-subTitle">メールアドレス</p>
                    <div align="center">
                        <input type="text" name="email" value="<?php echo $profile['email'] ?>" id="EditProfile-email" class="EditProfile-input" size="30">
                    </div>
                </div>

                <div class="EditProfile-pad-top">
                    <p class="EditProfile-subTitle">匿名機能</p>
                    <div class="EditProfile-infoWrap">
                        <p class="EditProfile-info">オフにすると、あなたのレビューに</p>
                        <p class="EditProfile-info">ユーザー名・ユーザーアイコンが表示されます</p>
                    </div>
                    <div class="EditProfile-isAnonymous-wrap">
                        <div class="form-check form-switch">
                            <input class="EditProfile-isAnonymous form-check-input" name="isAnonymous" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($profile['isAnonymous'] == 1) echo "checked" ?> value="<?php echo $profile['isAnonymous'] ?>">
                            <label class="form-check-label" for="flexSwitchCheckDefault" id="EditProfile-isAnonymous-label">
                                <?php echo $profile['isAnonymous'] == 1 ? "ON" : "OFF" ?>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- エラーメッセージ -->
                <div class="EditProfile-pad-top">
                    <div align="center">
                        <p id="EditProfile-dbError" class="EditProfile-error">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </p>
                        <p id="EditProfile-mailError" class="EditProfile-error"></p>
                    </div>
                </div>

                <div class="EditProfile-pad-top">
                    <div align="center">
                        <button type="button" class="btn btn-outline-success EditProfile-submit" onclick="EditProfile()">更新</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="../../features/UserProfile/editProfile.js"></script>

<?php
}
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>