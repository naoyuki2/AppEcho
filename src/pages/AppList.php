<?php
require_once '../components/Header.php';
require_once '../features/AppList/getAppList.php';
$AppList = getAppList();
?>

<div class="AppList-filta">
    <div class="AppList-input">
        <div class="AppList-category">
            <button class="AppList-btn">
                カテゴリ名<i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
            </button>
            <button class="AppList-btn">
                <i class="fa-regular fa-star" style="color: #4b4b4b"></i>
                5
                <i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
            </button>
            <button class="AppList-btn-reset">絞り込み解除</button>
        </div>
    </div>
</div>

<div class="AppList_wrap">

    <?php
    foreach ($AppList as $app) {
    ?>
        <div class="AppList_content">
            <a href=AppDetail.php?appId=<?php echo $app['id']?>"><img class="AppList_img" src="<?php echo $app['image_url'] ?>" alt="<?php echo $app['name'] ?>"></a>
            <p class="AppList_p"><?php echo $app['name'] ?></p>
        </div>
    <?php
    }
    ?>

</div>

<?php
require_once '../components/Footer.php';
?>