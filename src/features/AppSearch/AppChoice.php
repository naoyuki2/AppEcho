<?php
require_once 'getAppSearch.php';

$textFlg = false;
$starFlg = false;
$categoryFlg = false;
$sortFlg = false;

if (!empty($_POST['AppName'])) {
    $text = $_POST['AppName'];
    $textFlg = true;
} else {
    $text = 0;
}

if (!empty($_POST['star'])) {
    $star = $_POST['star'];
    $starFlg = true;
} else {
    $star = 0;
}

if (!empty($_POST['category'])) {
    $category = $_POST['category'];
    $categoryFlg = true;
} else {
    $category = 0;
}

if (!empty($_POST['sort'])) {
    $sort = $_POST['sort'];
    $sortFlg = true;
} else {
    $sort = 0;
}

$appId = getAppSearch($text, $category, $star, $sort);

if ($appId != -1 && $appId != 0) {
    $queryString = null;

    if ($appId != "sort") {
        $queryString = http_build_query($appId);
    }

    if ($textFlg) {
        $queryString .= '&' . http_build_query(['text' => $_POST['AppName']]);
    }

    if ($starFlg) {
        $queryString .= '&' . http_build_query(['star' => $_POST['star']]);
    }

    if ($categoryFlg) {
        $queryString .= '&' . http_build_query(['category' => $_POST['category']]);
    }

    if ($sortFlg) {
        if ($queryString != null) {
            $queryString .= '&' . http_build_query(['sort' => $_POST['sort']]);
        } else {
            $queryString = http_build_query(['sort' => $_POST['sort']]);
        }
    }
} else if ($appId == -1) {
    $queryString = http_build_query(['app' => -1]);
} else {
    $queryString = http_build_query(['app' => 0]);
}

header('Location: ../../pages/user/AppList.php?'. $queryString);
