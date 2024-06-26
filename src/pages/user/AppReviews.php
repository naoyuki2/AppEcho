<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppReviews/getReviews.php';
require_once dirname(__FILE__, 3) . '/features/AppFilter/getTag.php';

if (isset($_SESSION['user']['id'])) {
    $userId = $_SESSION['user']['id'];
}

$appId = $_GET['appId'];
if (isset($_GET['tagId'])) {
    $tagId = $_GET['tagId'];
}
if (isset($_GET['star'])) {
    $star = $_GET['star'];
}
$Reviews = [];
if (isset($tagId) && isset($star)) {
    $Reviews = getReviewsbytast($appId, $tagId, $star);
    $tagname = getTagname($tagId);
} else if (isset($tagId)) {
    $Reviews = getReviewsbyta($appId, $tagId);
    $tagname = getTagname($tagId);
} else if (isset($star)) {
    $Reviews = getReviewsbyst($appId, $star);
} else {
    $Reviews = getReviews($appId);
}
$GetTags = getTag();
$users = getUser();
?>

<div class="AppReviews-fi">
    <div class="AppReviews-input">
        <div class="AppReviews-category">
            <!-- タグフィルタ -->
            <?php
            if (isset($tagId)) {
                foreach ($tagname as $tag) {
            ?>
                    <div class="AppReviews-fl-left">
                        <button class="AppReviews-btn">
                            <?php echo $tag['name'] ?><i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                        </button>
                    </div>
            <?php
                }
            } ?>
            <!-- 星フィルタ -->
            <?php
            if (isset($star)) {
                foreach ($star as $stars) {
            ?>
                    <div class="AppReviews-fl-left">
                        <button class="AppReviews-btn">
                            <i class="fa-regular fa-star" style="color: #4b4b4b"></i>
                            <?php echo $stars ?>
                            <i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                        </button>
                    </div>
            <?php
                }
            }
            ?>
            <div class="AppReviews-fl-right-i">
                <div class="AppReviews-fi-a">
                    <a href="AppReviewFilter.php?appId=<?php echo $appId ?>"><i class="fa-solid fa-filter fa-2x"></i></a>
                </div>
            </div>
            <div class="AppReviews-fl-right">
                <a class="AppReviews-btn-reset" href="AppReviews.php?appId=<?php echo $appId ?>">絞り込み解除</a>
            </div>
            <div class="AppReviews-fl-clear"></div>
        </div>
    </div>
</div>

<?php foreach ($Reviews as $review) { ?>
    <div class="AppReviews-box">
        <form action="AppReviews.php" method="GET">
            <span class="AppReviews-number">No.<?php echo $review['id'] ?></span>
            <span class="AppReviews-point"><i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                <?php echo $review['star'] ?>
            </span>

            <input type="hidden" name="appId" id="appId" value="<?php echo $appId ?>">
            <input type="hidden" name="tagId[]" id="tagId[]" value="<?php echo $review['tag_id'] ?>">
            <button class="AppReviews-tag" style="color: #<?php echo $review['tag_color'] ?>;
        border-color: #<?php echo $review['tag_color'] ?>;">
                <?php echo $review['tag_name'] ?>
            </button>
        </form>

        <?php
        foreach ($users as $user) {
            if ($user['id'] == $review['user_id'] && $user['isAnonymous'] == 0) {
        ?>
                <div class="AppReviews-userWrap">
                    <img src="<?php echo $user['icon_image_url'] ?>" alt="userIcon" class="AppReviews-userIcon">
                    <span class="AppReviews-userName"><?php echo $user['name'] ?></span>
                </div>
        <?php
            }
        }
        ?>

        <p class="AppReviews-comment">
            <?php echo nl2br($review['content']) ?>
        </p>
        <div class="AppReviews-date">
            <?php echo $review['post_date'] ?>
        </div>
    </div>
<?php } ?>

<!-- モーダルを開くボタン -->
<button type="button" class="btn btn-primary" id="AppReviews-openmodal" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="AppReviews-plus fa-solid fa-plus"></i>
</button>

<!-- モーダルの内容 -->
<form action="../../features/AppReviews/postReview.php?appId=<?php echo $appId; ?>" method="post" id="AppReviews-form">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">レビュー投稿</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="AppReviews-subtitle">
                        <h4>評価</h4>
                    </div>
                    <div class="AppReviews-modal-star" id="modal-star">
                        <input value="1" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-1">
                        <label for="AppReviews-star-1" class="AppReviews-radio-label" id=1 onclick="toggleClass(0)"><i class="far fa-star"></i>1</label>
                        <input value="2" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-2">
                        <label for="AppReviews-star-2" class="AppReviews-radio-label" id=2 onclick="toggleClass(1)"><i class="far fa-star"></i>2</label>
                        <input value="3" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-3">
                        <label for="AppReviews-star-3" class="AppReviews-radio-label" id=3 onclick="toggleClass(2)"><i class="far fa-star"></i>3</label>
                        <input value="4" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-4">
                        <label for="AppReviews-star-4" class="AppReviews-radio-label" id=4 onclick="toggleClass(3)"><i class="far fa-star"></i>4</label>
                        <input value="5" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-5">
                        <label for="AppReviews-star-5" class="AppReviews-radio-label" id=5 onclick="toggleClass(4)"><i class="far fa-star"></i>5</label>
                    </div>
                    <div class="AppReviews-subtitle">
                        <h4>タグ</h4>
                    </div>
                    <div class="AppReviews-modal-tag" id="modal-tag">
                        <?php foreach ($GetTags as $tagModal) { ?>
                            <input id="<?php echo $tagModal['name'] ?>" type="radio" class="AppReviews-radio-tag" name="tagId" value="<?php echo $tagModal['id'] ?>">
                            <label for="<?php echo $tagModal['name'] ?>" class="AppReviews-radio-label" id="#<?php echo $tagModal['color'] ?>" style="color: #<?php echo $tagModal['color'] ?>; border-color: #<?php echo $tagModal['color'] ?>;" onclick="tagBgChange(<?php echo $tagModal['id'] ?>)"><?php echo $tagModal['name'] ?></label>
                        <?php } ?>
                    </div>
                    <div class="AppReviews-subtitle">
                        <h4>レビュー</h4>
                    </div>
                    <div><textarea class="AppReviews-review" name="content" id="AppReviews-reviewarea" placeholder="入力してください"></textarea></div>
                    <input type="hidden" name="userId" value="<?php echo isset($userId) ? $userId : null ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="AppReviews-post" data-bs-dismiss="modal" aria-label="Close" onclick="reviewCheck(<?php echo $appId; ?>)">投稿する</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="../../features/AppReviews/AppReviews-modal-star.js"></script>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>