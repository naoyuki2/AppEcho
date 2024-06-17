<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppSearch/getAppCategory.php';
$AppCategory = getAppCategory();
?>

<!-- アプリ投稿フォーム -->
<h2>アプリ投稿</h2>
<form action="../../features/App/postApp.php" method="POST" enctype="multipart/form-data">
    <label for="app_name">アプリ名:</label>
    <input type="text" id="app_name" name="app_name" maxlength="20" required><br>

    <label for="app_icon">アプリアイコン:</label>
    <input type="text" id="app_icon" name="app_icon" required><br>

    <label for="app_description">アプリ説明:</label>
    <textarea id="app_description" name="app_description" maxlength="140" required></textarea><br>

    <label for="app_link">ストアリンク:</label>
    <input type="url" id="app_link" name="app_link"><br>

    <label for="play_link">Playストアリンク:</label>
    <input type="url" id="play_link" name="play_link"><br>

    <label for="app_category">カテゴリ:</label>
    <select id="app_category" name="app_category" required>
        <?php foreach($AppCategory as $category){ ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php } ?>
    </select><br>

    <label for="search_keywords">検索用キーワード:</label>
    <textarea id="search_keywords" name="search_keywords" required></textarea><br>

    <input type="submit" value="投稿する">
</form>
    
<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>