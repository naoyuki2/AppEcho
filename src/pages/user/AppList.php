<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppList/getAppList.php';
$AppList = getAppList();
?>

<?php
$AppList;
$tagFlg = false;
$textFlg = false;
$categoryFlg = false;
$starFlg = false;
$categories = [];
$stars = [];

if (!empty($_SERVER['QUERY_STRING'])) { // getパラメーターの存在チェック
    $queryString = $_SERVER['QUERY_STRING'];
    parse_str($queryString, $params);   // url文字列の解析

    $textIndex = null;
    $starIndex = null;
    $categoryIndex = null;

    foreach ($params as $key => $value) {
        if (strpos($key, 'text') !== false) {
            $textIndex = $key;
            break;
        }
    }

    foreach ($params as $key => $value) {
        if (strpos($key, 'star') !== false) {
            $starIndex = $key;
            break;
        }
    }
    foreach ($params as $key => $value) {
        if (strpos($key, 'category') !== false) {
            $categoryIndex = $key;
            break;
        }
    }

    if ($textIndex !== null) {
        $before = array_slice($params, 0, array_search($textIndex, array_keys($params)));
        if (is_array($_GET['text'])) {
            $split = $_GET['text'];
        } else {
            $pattern = "/[\s,、]/";
            $split = preg_split($pattern, $_GET['text']);
        }
        $textFlg = true;

        if ($starIndex !== null) {
            $stars = $_GET['star'];
            $starFlg = true;
        }

        if ($categoryIndex !== null) {
            $categories = $_GET['category'];
            $categoryFlg = true;
        }
    } else if ($starIndex !== null) {
        $before = array_slice($params, 0, array_search($starIndex, array_keys($params)));
        $stars = $_GET['star'];
        $starFlg = true;

        if ($categoryIndex !== null) {
            $categories = $_GET['category'];
            $categoryFlg = true;
        }
    } else if ($categoryIndex !== null) {
        $before = array_slice($params, 0, array_search($categoryIndex, array_keys($params)));
        $categories = $_GET['category'];
        $categoryFlg = true;
    }
} else {
    $params = -1;
}

if ($params == -1) {
    $AppList = getAppList();    // getパラメータがなければ全件表示
} else if (!empty($params) && !empty($params[0]) && empty($params['app'])) {
    $AppList = getAppListByParams($before);
    $tagFlg = true; // 検索パラメーターが存在する場合のみタグを表示
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
    if ($tagFlg) {
    ?>
        <div class="AppList-filta">
            <div class="AppList-input">
                <div class="AppList-category">
                    <form action="../../features/AppSearch/AppChoice.php" method="post" name="tagForm">
                        <?php
                        if ($textFlg) {
                        ?>
                            <div class="AppList-fl-left">
                                <?php
                                $textCnt = 0;
                                for ($i = 0; $i < count($split); $i++) {
                                    if ($split[$i] !== "") {
                                ?>
                                        <input type="hidden" name="AppName[]" value="<?php echo $split[$i] ?>" class="AppList-btn-text">
                                        <button type="button" class="AppList-btn" onclick="textCancel(<?php echo $textCnt ?>)">
                                            <?php echo $split[$i] ?><i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                                        </button>
                                <?php
                                        $textCnt++;
                                    }
                                }
                                ?>
                            </div>
                        <?php
                        }
                        if ($categoryFlg) {
                        ?>
                            <div class="AppList-fl-left">
                                <?php
                                for ($i = 0; $i < count($categories); $i++) {
                                ?>
                                    <input type="hidden" name="category[]" value="<?php echo $categories[$i] ?>" class="AppList-btn-category">
                                    <button type="button" class="AppList-btn" onclick="categoryCancel(<?php echo $i ?>)">
                                        <?php echo $categories[$i] ?><i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                                    </button>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="AppList-fl-left">
                            <?php
                            if ($starFlg) {
                            ?>
                                <div class="AppList-fl-left">
                                    <?php
                                    for ($i = 0; $i < count($stars); $i++) {
                                    ?>
                                        <input type="hidden" name="star[]" value="<?php echo $stars[$i] ?>" class="AppList-btn-star">
                                        <button type="button" class="AppList-btn" onclick="starCancel(<?php echo $i ?>)">
                                            <i class=" fa-regular fa-star AppList-icon" style="color: #4b4b4b"></i>
                                            <?php echo $stars[$i] ?>
                                            <i class="fa-solid fa-xmark" style="color: #4b4b4b"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="AppList-fl-right">
                            <button type="button" class="AppList-btn-reset" onclick="allClear()">絞り込み解除</button>
                        </div>
                        <div class="AppList-fl-clear"></div>
                    <?php
                }
                    ?>
                    </form>
                </div>
            </div>
        </div>
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
        <script src="../../features/AppList/AppList.js"></script>
    <?php
    require_once dirname(__FILE__, 3) . '/components/Footer.php';
    ?>