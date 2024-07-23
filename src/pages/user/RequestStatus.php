<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppRequest/getRequest.php';
$request=getRequestByUserId($_SESSION['user']['id']);
$color;
?>

<div class="AppRequestStatus-box">
    <div class="AppRequestStatus-title">
        <span class="AppRequestStatus-title-status">申請状況</span>
        <span class="AppRequestStatus-title-appname">アプリ名</span>
        <span class="AppRequestStatus-title-judgedate">受理/破棄日</span>
        <span class="AppRequestStatus-title-reqdate">申請日</span>
    </div>
    <?php
    if(empty($request)){
        ?>
        <div class="AppRequestStatus-no">
            <h3>まだ申請はありません</h3>
        </div>
        <?php
    }
    ?>
    <?php foreach($request as $Request) { 
        $isJudge = isset($Request['judge_date']);
    ?>

    <div class="AppRequestStatus">
        <!-- 申請状況 -->
        <span class="status <?php echo $color ?> ">
            <?php
                //  0=申請中、1＝受理、2＝破棄
                if ($Request['status'] === 0) {
                    echo '<i class="fa-solid fa-spinner fa-2xl"></i>';
                } elseif ($Request['status'] === 1) {
                    echo '<i class="fa-solid fa-check fa-2xl" style="color: #3ea632;"></i>';
                } elseif ($Request['status'] === 2) {
                    echo '<i class="fa-solid fa-xmark fa-2xl" style="color: #e37141;"></i>';
                }
                ?>
        </span>
        <!-- アプリ名 -->
        <span class="AppRequestStatus-appname"><?php echo $Request['app_name'] ?></span>
        <!-- 申請日 -->
        <span class="AppRequestStatus-request_date"><?php echo $Request['request_date'] ?></span>
        <!-- 受理/破棄日 -->
        <span class="AppRequestStatus-judge_date"><?php echo $isJudge ? $Request['judge_date'] : '申請中です。' ?></span>
    </div>
    <?php } ?>

    <div class="AppRequestStatus-pad-top">
        <button type="button" class="btn btn-primary" id="AppRequestStatus-openmodal" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="AppReviews-plus fa-solid fa-plus"></i>
        </button>
    </div>

    <!-- モーダルの内容 -->
    <form action="../../features/AppRequest/postRequest.php" method="post" id="AppRequestStatus-form">

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">アプリ申請</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="AppRequestStatus-request" name="request" size="40" maxlength="20" placeholder="登録したいアプリの名前を入力してください">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="AppRequestStatus-post" value="申請する" data-bs-dismiss="modal">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>