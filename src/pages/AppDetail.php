<?php
require_once '../components/Header.php';
require_once '../features/AppDetail/getAppDetail.php';
$AppList = getAppList();
?>

<?php
echo '<pre>';
print_r($AppList);
echo '</pre>';
?>

<?php
require_once '../components/Footer.php';
?>