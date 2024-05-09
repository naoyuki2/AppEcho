<?php
    require_once '../components/Header.php';
    require_once '../features/AppList/getReviews.php';
    $Reviews = getReviews();

?>

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