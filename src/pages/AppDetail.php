<?php
require_once '../components/Header.php';
require_once '../features/AppDetail/getAppDetail.php';
$AppDetail = getAppDetail($_GET['id']);
?>

<?php
foreach ($AppDetail as $detail) {
?>
    <div class="AppDetail-main">
        <div class="AppDetail-pad">
            <div align="center">
                <img src="<?php echo $detail['image_url'] ?>" alt="" class="AppDetail-ex">
            </div>
            <div align="left">
                <b>
                    <p class="AppDetail-midasi">アプリ名</p>
                </b>
            </div>
            <div align="center">
                <p><?php echo $detail['name'] ?></p>
            </div>

            <div align="left">
                <b>
                    <p class="AppDetail-midasi">アプリ説明</p>
                </b>
            </div>
            <div align="center">
                <p><?php echo $detail['info'] ?></p>
            </div>

            <div align="left">
                <b>
                    <p class="AppDetail-midasi">ダウンロード</p>
                </b>
            </div>
            <div class="AppDetail-div-center">
                <a href="<?php echo $detail['appLink'] ?>" class="AppDetail-Link">
                    <img src="https://nabettu.github.io/appreach/img/itune_ja.svg" alt="" class="AppDetail-LinkImage">
                </a>
                <a href="<?php echo $detail['playLink'] ?>" class="AppDetail-Link">
                    <img src="https://nabettu.github.io/appreach/img/gplay_ja.png" alt="" class="AppDetail-LinkImage">
                </a>
            </div>

            <div align="left">
                <b>
                    <p class="AppDetail-midasi">平均評価</p>
                </b>
            </div>
            <div align="center">
                <?php
                if ($detail['star'] !== null) {
                    for ($i = 0; $i < $detail['star']; $i++) {
                ?>
                        <i class="fa-solid fa-star fa-3x" style="color: #FFD43B;"></i>
                        <?php
                    }
                    if ($detail['star'] != 5) {
                        for ($i = 0; $i < (5 - $detail['star']); $i++) {
                        ?>
                            <i class="fa-regular fa-star fa-3x" style="color: #4b4b4b"></i>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <p>まだ評価されていません</p>
                <?php
                }
                ?>
            </div>

            <div class="AppDetail-foot">
                <div class="AppDetail-fl-left">
                    <p class="AppDetail-com"><?php echo $detail['review'] ?></p>
                    <a href="../pages/AppReviews.php?appId=<?php echo 1 ?>" class="AppDetail-a">
                        <i class="fa-regular fa-comment fa-2x" style="color: #4b4b4b;"></i>
                    </a>
                </div>
                <div class="AppDetail-fl-right">
                    <div class="AppDetail-pad-botm">
                        <a href="../pages/AppList.php" class="AppDetail-a">
                            <p class="AppDetail-categori"><?php echo $detail['category_name'] ?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
require_once '../components/Footer.php';
?>