<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppRandom/getAppRandom.php';
$appId = getAppRandom();
?>

<form action="AppDetail.php" method="get" name="AppRandomForm">
    <input type="hidden" name="appId" value="<?php echo $appId ?>">
</form>

<script src="../../features/AppRandom/appRandom.js"></script>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>