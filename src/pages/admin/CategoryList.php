<?php
    require_once dirname(__FILE__, 3) . '/components/Header.php';
    require_once dirname(__FILE__, 3) . '/features/AppSearch/getAppCategory.php';
    $AppCategory = getAppCategory();
?>

    <!-- カテゴリ一覧表示 -->
    <h1>カテゴリ一覧</h1>
    <?php foreach($AppCategory as $category){ ?>
        <p><?php echo $category['name'] ?></p>
        <br>
    <?php } ?>

    <!-- モーダル -->
    <form action="../../features/AppCategory/postCategory.php" method="post">
        <input type="text" name="category_name">
        <button type="submit">追加</button>
    </form>
    
<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>