<?php
    require_once dirname(__FILE__, 3) . '/components/Header.php';
    require_once dirname(__FILE__, 3) . '/features/AppSearch/getAppTag.php';
    $AppTag = getAppTag();
?>

    <!-- タグ一覧表示 -->
    <h1>タグ一覧</h1>
    <?php foreach($AppTag as $tag){ ?>
        <p><?php echo $tag['name'] ?></p>
        <br>
    <?php } ?>

    <!-- モーダル -->
    <form action="../../features/AppCategory/postTag.php" method="post">
        <input type="text" name="tag_name">
        <button type="submit">追加</button>
    </form>
    
<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>