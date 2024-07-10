<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppRandom/getAppAll.php';
$appList = getAppAll();
$Id = rand(1,$appList['app_count']);
header('Location:../../pages/user/AppDetail.php?appId='.$Id);
exit();
?>

<div>
    <p>ここでアニメーション入れたい</p>
</div>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>