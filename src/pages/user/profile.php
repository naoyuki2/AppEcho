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
$reviews = getReview($userId);
$requests = getRequest($userId);

foreach ($profiles as $profile) {
?>

    <div class="profile-main">
        <div class="profile-mainInfo">
            <!-- プロフィール編集遷移ボタン -->
            <div class="profile-configIcon-wrap">
                <div class="profile-configIcon">
                    <a href="./EditProfile.php"><i class="fas fa-cog profile-configIcon-content"></i></a>
                </div>
                <div class="profile-logoutIcon">
                    <a onclick="logoutCheck()"><i class="fas fa-sign-out-alt profile-logoutIcon-content"></i></a>
                </div>
            </div>

            <!-- プロフィール画像 -->
            <div class="profile-image-wrap">
                <div align="center">
                    <img src="<?php echo $profile['icon_image_url'] ?>" alt="userIcon" class="profile-image">
                </div>
            </div>

            <!-- ユーザーネーム -->
            <div class="profile-pad-top">
                <div align="center">
                    <p class="profile-userName"><?php echo $profile['name'] ?></p>
                </div>
            </div>

            <!-- メールアドレス -->
            <div>
                <div align="center">
                    <p class="profile-email"><?php echo $profile['email'] ?></p>
                </div>
            </div>
        </div>

        <div class="profile-subInfo">
            <div class="profile-review">
                <a href="ReviewHistory.php" class="profile-link">
                    <p class="profile-review-count"><?php echo isset($reviews['review']) ? $reviews['review'] : '0' ?></p>
                    <p class="profile-review-text">REVIEWS</p>
                </a>
            </div>

            <div class="profile-request">
                <a href="RequestStatus.php" class="profile-link">
                    <p class="profile-request-count"><?php echo isset($requests['request']) ? $requests['request'] : '0' ?></p>
                    <p class="profile-request-text">REQUESTS</p>
                </a>
            </div>
        </div>

        <!-- 匿名機能 -->
        <div>
            <div class="profile-anonymous">
                <p>匿名機能：<?php echo $profile['isAnonymous'] == 1 ? 'オン' : 'オフ' ?></p>
            </div>
        </div>
    </div>

    <script src="../../features/UserProfile/profile.js"></script>

<?php
}
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>