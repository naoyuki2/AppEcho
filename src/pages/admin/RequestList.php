<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppRequest/getRequest.php';
$allRequest = getRequest();
?>

<?php foreach ($allRequest as $request) { ?>
    <div class="Request-box">
        <img src="<?php echo $request['user_icon'] ?>">
        <span class="Request-user-name"><?php echo $request['user_name'] ?></span>
        <span class="Request-app-name"><?php echo $request['app_name'] ?></span>
        <button class="Request-dest" value=2>破棄</button>
        <button class="Request-accept" value=1>受理</button>
    </div>
<?php } ?>

<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>