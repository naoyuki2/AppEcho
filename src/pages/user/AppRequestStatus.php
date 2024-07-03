<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppRequest/getRequest.php';
$request=getRequestByUserId($_SESSION['user']['id']);
$color;
?>

<?php foreach($request as $Request) { 
    if ($Request['status'] === "0") {
        $color="request";
    } elseif ($Request['status'] === "1") {
        $color="acceptance";
    } elseif ($Request['status'] === "2") {
        $color="destruction";
    }
?>


<div class="AppRequestStatus">
    <!-- アプリ名 -->
    <span class="name"><?php echo $Request['app_name'] ?></span>
    <!-- 申請状況 -->
    <span class="status <?php echo $color ?> ">
        <?php
            //  0=申請中、1＝受理、2＝破棄
            if ($Request['status'] === "0") {
                echo "申請中";
            } elseif ($Request['status'] === "1") {
                echo "受理";
            } elseif ($Request['status'] === "2") {
                echo "破棄";
            }
            ?>
    </span>
</div>
<?php } ?>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>