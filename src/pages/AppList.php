<?php
    require_once '../components/Header.php';
    require_once '../features/AppList/getAppInfo.php';
    $AppList = getAppList();
?>

<?php foreach ($AppList as $app) { ?>
    <img src="<?php echo $app['image_url'] ?>" alt="">
    <p><?php echo $app['name'] ?></p>
<?php } ?>

<?php
    require_once '../components/Footer.php';
?>
