<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppList/getAppList.php';
require_once dirname(__FILE__, 3) . '/features/AppList/getNewReview.php';
$AppList = getAppList();
$newReview = getNewReview();
echo '<pre>';
print_r($newReview);
echo '</pre>';
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
            $pattern = "/[\s,、]/u";
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

$sortFlg = false;

if ($params == -1) {
    $AppList = getAppList();    // getパラメータがなければ全件表示
} else if (!empty($params) && !empty($params[0]) && empty($params['app'])) {
    $AppList = getAppListByParams($before);
    $tagFlg = true; // 検索パラメーターが存在する場合のみタグを表示

    if (!empty($params['sort'])) $sortFlg = true;
} else if (!empty($params['sort'])) {
    $AppList = getAppList();
    $sortFlg = true;
    $tagFlg = true;
} else {
    $params['app'] == -1 ? $AppList = getAppList() : $AppList = 0;
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
                            <?php
                            $textCnt = 0;
                            for ($i = 0; $i < count($split); $i++) {
                                if ($split[$i] !== "") {
                            ?>
                                    <div class="AppList-fl-left">
                                        <input type="hidden" name="AppName[]" value="<?php echo $split[$i] ?>" class="AppList-btn-text">
                                        <button type="button" class="AppList-btn" onclick="textCancel(<?php echo $textCnt ?>)">
                                            <?php echo $split[$i] ?>
                                        </button>
                                    </div>
                            <?php
                                    $textCnt++;
                                }
                            }
                        }
                        if ($categoryFlg) {
                            ?>
                            <?php
                            for ($i = 0; $i < count($categories); $i++) {
                            ?>
                                <div class="AppList-fl-left">
                                    <input type="hidden" name="category[]" value="<?php echo $categories[$i] ?>" class="AppList-btn-category">
                                    <button type="button" class="AppList-btn" onclick="categoryCancel(<?php echo $i ?>)">
                                        <?php echo $categories[$i] ?>
                                    </button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if ($starFlg) {
                        ?>
                            <?php
                            for ($i = 0; $i < count($stars); $i++) {
                            ?>
                                <div class="AppList-fl-left">
                                    <input type="hidden" name="star[]" value="<?php echo $stars[$i] ?>" class="AppList-btn-star">
                                    <button type="button" class="AppList-btn" onclick="starCancel(<?php echo $i ?>)">
                                        <i class=" fa-regular fa-star AppList-icon" style="color: #4b4b4b"></i>
                                        <?php echo $stars[$i] ?>
                                    </button>
                                </div>
                            <?php
                            }
                        }
                        if ($sortFlg) {
                            ?>
                            <div class="AppList-fl-left">
                                <?php
                                switch ($_GET['sort']) {
                                    case 0:
                                        break;
                                    case 1:
                                        usort($AppList, function ($row, $high) {
                                            return $high['star'] <=> $row['star'];
                                        });
                                ?>
                                        <button type="submit" class="AppList-btn">
                                            評価が高い順
                                        </button>
                                    <?php
                                        break;
                                    case 2:
                                        usort($AppList, function ($row, $high) {
                                            return $row['star'] <=> $high['star'];
                                        });
                                    ?>
                                        <button type="submit" class="AppList-btn">
                                            評価が低い順
                                        </button>
                                    <?php
                                        break;
                                    case 3:
                                        usort($AppList, function ($row, $high) {
                                            return $high['upload_date'] <=> $row['upload_date'];
                                        });
                                    ?>
                                        <button type="submit" class="AppList-btn">
                                            新しい順
                                        </button>
                                    <?php
                                        break;
                                    case 4:
                                        usort($AppList, function ($row, $high) {
                                            return $row['upload_date'] <=> $high['upload_date'];
                                        });
                                    ?>
                                        <button type="submit" class="AppList-btn">
                                            古い順
                                        </button>
                                <?php
                                        break;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="AppList-fl-right">
                            <button type="button" class="AppList-btn-reset" onclick="allClear()">絞り込み解除</button>
                        </div>
                        <div class="AppList-fl-clear"></div>
                    <?php
                }
                    ?>
                </div>
            </div>
        </div>
        <div class="flow01 l-section">
            <div class="l-inner">
                <div class="swiper-pagination swiper-pagination-main"></div>
                <div class="swiper swiper-main">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="mainslide">
                                <div class="subslide">
                                    <div class="AppList_wrap">
                                        <div class="AppList_content">
                                            <a href="AppRandomView.php"><img class="AppList_img" src="" alt="ランダム"></a>
                                        </div>
                                        <?php
                                        $cnt1 = 2;
                                        $cnt2 = 1;
                                        foreach ($AppList as $app) {
                                        ?>
                                            <div class="AppList_content">
                                                <a href="AppDetail.php?appId=<?php echo $app['id'] ?>" class="<?php echo in_array($app['id'],$newReview) ? 'position-relative' : '' ?>"><img class="AppList_img" src="<?php echo $app['image_url'] ?>" alt="<?php echo $app['name'] ?>">
                                                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php
                                            if ($cnt1 % 4 == 0) {
                                            ?>
                                    </div>
                                    <div class="AppList_wrap">
                                    <?php
                                                $cnt2++;
                                            }
                                            if ($cnt2 % 6 == 0) {
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="mainslide">
                                <div class="subslide">
                                    <div class="AppList_wrap">
                                <?php
                                                $cnt2++;
                                            }
                                            $cnt1++;
                                        }
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        <?php
    }
        ?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="../../features/AppList/AppList.js"></script>
        <?php
        require_once dirname(__FILE__, 3) . '/components/Footer.php';
        ?>