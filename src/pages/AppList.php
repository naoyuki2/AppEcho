<?php
require_once '../components/Header.php';
require_once '../features/AppList/getAppInfo.php';

$AppList;
$params = -1;   // 初期化

if (!empty($_SERVER['QUERY_STRING'])) { // getパラメーターの存在チェック
    $queryString = $_SERVER['QUERY_STRING'];
    parse_str($queryString, $params);   // url文字列の解析
}

if ($params == -1) {
    $AppList = getAppList();    // getパラメータがなければ全件表示
} else if (!empty($params) && !empty($params[0]) && empty($params['app'])) {
    $AppList = getAppListByParams($params);
} else {
    if ($params['app'] == -1) {
        $AppList = getAppList();    // appが-1の場合は全件表示
    } else {
        $AppList = 0;   // appが0の場合は該当なし
    }
}

if ($AppList == 0) {
?>
    <p class="AppList_msg">該当するアプリはありません</p>
<?php
} else {
?>
    <div class="AppList_wrap">
        <?php
        foreach ($AppList as $app) {
        ?>
            <div class="AppList_content">
                <a href=AppDetail.php?appId=<?php echo $app['id'] ?>"><img class="AppList_img" src="<?php echo $app['image_url'] ?>" alt="<?php echo $app['name'] ?>"></a>
                <p class="AppList_p"><?php echo $app['name'] ?></p>
            </div>
    <?php
        }
    }
    ?>

    </div>

    <?php
    require_once '../components/Footer.php';
    ?>