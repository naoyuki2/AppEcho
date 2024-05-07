<?php
    require_once '../components/Header.php';
?>

<?php for($i = 1;$i <= 10;$i++){ ?>
    <div class="AppReviews-box">
        <span class="AppReviews-number">No.<?php echo $i ?></span>
        <span class="AppReviews-point"><i class="fa-solid fa-star" style="color: #FFD43B;">☆</i>5</span>
        <span class="AppReviews-tag">感想</span>
        <div class="AppReviews-comment">内容</div>
        <div class="AppReviews-date">2024/05/01</div>
    </div>
<?php } ?>

<?php
    require_once '../components/Footer.php';
?>