<?php
require_once '../components/Header.php';
require_once '../features/AppList/getAppInfo.php';
$AppList = getAppList();
?>
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