<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppReviews/getReviews.php';
require_once dirname(__FILE__, 3) . '/features/AppFilter/getTag.php';
require_once dirname(__FILE__, 3) . '/features/AppList/getAppList.php';

$Reviews = [];
if(isset($tagId) && isset($star)) {
    $Reviews = getReviewsbytast($appId,$tagId,$star);
    $tagname = getTagname($tagId);
} else if (isset($tagId)){
    $Reviews = getReviewsbyta($appId,$tagId);
    $tagname = getTagname($tagId);
} else if(isset($star)){
    $Reviews = getReviewsbyst($appId,$star);
} 

$GetTags = getTag();
?>

<div class="AppReviews-box">
        <form action="AppReviews.php" method="GET">
        <!-- アプリ名 -->
        <span class="AppReviews-number">アプリ名</span>
        <span class="AppReviews-point"><i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            5
        </span>
        <button class="AppReviews-tag" style="color: #<?php echo $review['tag_color'] ?>;
        border-color: #<?php echo $review['tag_color'] ?>;">
        タグ
        </button>
        </form>
        <!-- 内容 -->
        <p class="AppReviews-comment">
            内容
        </p>
        <!-- 日時 -->
        <div class="AppReviews-date">
            日時
        </div>
    </div>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>