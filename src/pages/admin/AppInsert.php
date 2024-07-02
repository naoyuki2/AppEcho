<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppSearch/getAppCategory.php';
require_once dirname(__FILE__, 3) . '/features/AppRequest/getRequestName.php';
$reqId = $_GET['reqId'];
$AppCategory = getAppCategory();
$reqName = getRequestName($reqId);
?>

<!-- アプリ投稿フォーム -->
<h2>アプリ投稿</h2>
<form action="../../features/App/postApp.php" method="post">
    <label for="AppName">アプリ名:</label>
    <input type="text" id="AppName" name="AppName" size="30" placeholder="アプリ名を入力" value="<?php echo $reqName ?>"><br>

    <label for="AppIcon">アプリアイコン:</label>
    <input type="text" id="AppIcon" name="AppIcon" size="30" placeholder="アプリアイコンのリンクを入力"><br>

    <label for="AppDescription">アプリ説明:</label>
    <input type="text" id="AppDescription" name="AppDescription" size="30" placeholder="アプリの説明を入力"><br>

    <label for="AppStoreLink">ストアリンク:</label>
    <input type="text" id="AppStoreLink" name="AppStoreLink" size="30" placeholder="ストアリンクを入力"><br>

    <label for="AppPlayLink">Playストアリンク:</label>
    <input type="text" id="AppPlayLink" name="AppPlayLink" size="30" placeholder="Playストアリンクを入力"><br>

    <p class="AppInsert-content">カテゴリ</p>
    <div class = "AppInsert-input">
        <?php
        $cnt = 1;
        foreach ($AppCategory as $category) {
        ?>
            <div class="AppInsert-category">
                <input type="radio" name="AppCategory" class="btn-check AppInsert-btnCheck" id="AppInsert-radio-category-<?php echo $category['id'] ?>" autocomplete="off" value="<?php echo $category['id'] ?>">
                <label class="btn btn-outline-primary AppInsert-btn" for="AppInsert-radio-category-<?php echo $category['id'] ?>"><?php echo $category['name'] ?></label>
            </div>
        <?php
            if ($cnt % 4 == 0) {
                echo '</div><div class="AppInsert-input">';
            }
            $cnt++;            
        }
        ?>
    </div>

    <label for="AppKeyword">検索用キーワード:</label>
    <input type="text" id="AppKeyword" name="AppKeyword" placeholder="検索用キーワードを入力" size="30"></input><br>

    <button type="submit" class="AppInsert-submit btn btn-outline-success">投稿する</button>
</form>

<script src="../../features/AppSearch/AppSearch.js"></script>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>