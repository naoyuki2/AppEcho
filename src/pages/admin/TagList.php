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

    <!-- タグ追加モーダル -->
    <form action="../../features/AppTag/postTag.php" method="post">
        <input type="text" name="tag_name"> <br>
        <input type="color" name="tag_color" value="e66465" /> <br>
        <button type="submit">追加</button>
    </form>
    
<?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>