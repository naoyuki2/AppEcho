<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppSearch/getAppCategory.php';
require_once dirname(__FILE__, 3) . '/features/AppDetail/getAppDetail.php';
$AppCategory = getAppCategory();
$appId = $_GET['appId'];
$AppDetail = getAppDetail($appId);
?>

<?php
foreach ($AppDetail as $appdetail) {
?>

<form action="../../features/App/updateApp.php?appId=<?php echo $appId; ?>" method="post">
    <div class="AppUpdate-wrap">

        <!-- アプリ情報入力 -->
        <div class="AppUpdate-content">
            <p class="AppUpdate-subTitle">アプリ名</p>
            <input type="text" name="AppName" class="AppUpdate-text" placeholder="アプリ名を入力" size="30" value="<?php echo $appdetail['name'] ?>">
        </div>

        <div class="AppUpdate-content">
            <p class="AppUpdate-subTitle">アプリアイコン</p>
            <input type="text" name="AppIcon" class="AppUpdate-text" placeholder="アプリアイコンのリンクを入力" size="30" value="<?php echo $appdetail['image_url'] ?>">
        </div>

        <div class="AppUpdate-content">
            <p class="AppUpdate-subTitle">アプリ説明</p>
            <input type="text" name="AppDescription" class="AppUpdate-text" placeholder="アプリ説明を入力" size="30" value="<?php echo $appdetail['info'] ?>">
        </div>

        <div class="AppUpdate-content">
            <p class="AppUpdate-subTitle">ストアリンク(AppStore)</p>
            <input type="text" name="AppStoreLink" class="AppUpdate-text" placeholder="アプリのストアリンク(AppStore)を入力" size="30" value="<?php echo $appdetail['appLink'] ?>">
        </div>

        <div class="AppUpdate-content">
            <p class="AppUpdate-subTitle">ストアリンク(GooglePlay)</p>
            <input type="text" name="AppPlayLink" class="AppUpdate-text" placeholder="アプリのストアリンク(GooglePlay)を入力" size="30" value="<?php echo $appdetail['playLink'] ?>">
        </div>

        <!-- カテゴリ選択 -->
        <div class="AppUpdate-content">
            <p class="AppUpdate-subTitle">カテゴリ</p>
            <div class="AppUpdate-input">
                <?php
                $cnt = 1;
                foreach ($AppCategory as $category) {
                ?>
                    <div class="AppUpdate-category">
                        <?php if($appdetail['category_id'] == $category['id']){ ?>
                            <input type="radio" name="AppCategory" class="btn-check AppUpdate-btnCheck" id="AppUpdate-radio-category-<?php echo $category['id'] ?>" autocomplete="off" value="<?php echo $category['name'] ?>" checked>
                        <?php }else{ ?>
                            <input type="radio" name="AppCategory" class="btn-check AppUpdate-btnCheck" id="AppUpdate-radio-category-<?php echo $category['id'] ?>" autocomplete="off" value="<?php echo $category['name'] ?>">
                        <?php } ?>
                        <label class="btn btn-outline-primary AppUpdate-btn" for="AppUpdate-radio-category-<?php echo $category['id'] ?>"><?php echo $category['name'] ?></label>
                    </div>
                <?php
                    if ($cnt % 4 == 0) {
                        echo '</div><div class="AppUpdate-input">';
                    }
                    $cnt++;
                }
                ?>
            </div>
        </div>

        <div class="AppUpdate-content">
            <?php $keywordJson = json_decode($appdetail['keyword'], true);
                $jsonKey = '["';
                for ($i = 0; $i < count($keywordJson);$i++) {
                    $jsonKey = $jsonKey.$keywordJson[$i].'"';
                    if($i != count($keywordJson)-1){
                        $jsonKey = $jsonKey.',"';
                    }
                }
                $jsonKey = "'".$jsonKey."]'";
            ?>
            <p class="AppUpdate-subTitle">検索用キーワード</p>
            <input type="text" name="AppKeyword" class="AppUpdate-text" placeholder="検索用キーワードを入力" size="30" value=<?php print $jsonKey ?>>
        </div>

        <button type="submit" class="AppUpdate-submit btn btn-outline-success">完了</button>
    </div>
</form>

<?php } ?>

<script src="../../features/AppSearch/AppSearch.js"></script>

<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>