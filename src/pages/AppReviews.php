<?php
    require_once '../components/Header.php';
    require_once '../features/AppReviews/getReviews.php';
    $Reviews = getReviews($_GET['appId']);
?>

<div class="AppReviews-fi">
    <div class="AppReviews-input">
        <div class="AppReviews-category">
            <div class="AppReviews-fl-left">
                <button class="AppReviews-btn">
                    感想<i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                </button>
            </div>
            <div class="AppReviews-fl-left">
                <button class="AppReviews-btn">
                    <i class="fa-regular fa-star" style="color: #4b4b4b"></i>
                    5
                    <i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                </button>
            </div>
            <div class="AppReviews-fl-right">
                <i class="fa-solid fa-filter"></i>
            </div>
            <div class="AppReviews-fl-right">
                <button class="AppReviews-btn-reset">絞り込み解除</button>
            </div>
            <div class="AppReviews-fl-clear"></div>
        </div>
    </div>
</div>

<?php foreach($Reviews as $review){ ?>
    <div class="AppReviews-box">
        <span class="AppReviews-number">No.<?php echo $review['id'] ?></span>
        <span class="AppReviews-point"><i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <?php echo $review['star'] ?>
        </span>
        <span class="AppReviews-tag" style="color: #<?php echo $review['tag_color'] ?>;
        border-color: #<?php echo $review['tag_color'] ?>;">
            <?php echo $review['tag_name'] ?>
        </span>
        <p class="AppReviews-comment">
            <?php echo $review['content'] ?>
        </p>
        <div class="AppReviews-date">
            <?php echo $review['post_date'] ?>
        </div>
    </div>
<?php } ?>

<?php
    require_once '../components/Footer.php';
?>