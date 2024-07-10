<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppReviews/getReviewsByUserId.php';
require_once dirname(__FILE__, 3) . '/features/AppDetail/getAppDetail.php';
$Reviews = getReviewsByUserId();

foreach ($Reviews as $review) {
    $app = getAppDetail($review['app_id']);
?>
    <div class="AppReviews-box">
        <form action="AppReviews.php" method="GET">
            <!-- アイコン -->
            <a href="./AppDetail.php?appId=<?php echo $review['app_id'] ?>" class="ReviewHistory-link">
                <img src=" <?php echo $app[0]['image_url'] ?>" alt="icon_url" class="ReviewHistory-icon">
            </a>

            <input type="hidden" name="appId" id="appId" value="<?php echo $review['app_id'] ?>">
            <input type="hidden" name="tagId[]" id="tagId[]" value="<?php echo $review['tag_id'] ?>">
            <button class="AppReviews-tag" style="color: #<?php echo $review['tag_color'] ?>;
        border-color: #<?php echo $review['tag_color'] ?>;">
                <?php echo $review['tag_name'] ?>
            </button>
        </form>

        <div class="ReviewHistory-comment-wrap">
            <p class="ReviewHistory-comment">
                <?php echo nl2br($review['content']) ?>
            </p>
        </div>
        <div class="AppReviews-date">
            <?php echo $review['post_date'] ?>
        </div>
    </div>
<?php } ?>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>