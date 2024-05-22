<?php
require_once '../features/AppSearch/getAppSearch.php';

if (!empty($_POST['AppName'])) {
    $text = $_POST['AppName'];
} else {
    $text = 0;
}

if (!empty($_POST['star'])) {
    $star = $_POST['star'];
} else {
    $star = 0;
}

if (!empty($_POST['category'])) {
    $category = $_POST['category'];
} else {
    $category = 0;
}

$appId = getAppSearch($text, $category, $star);

if ($appId != -1 && $appId != 0) {
    $queryString = http_build_query($appId);
} else if ($appId == -1) {
    $queryString = http_build_query(['app' => -1]);
} else {
    $queryString = http_build_query(['app' => 0]);
}

header('Location: ./AppList.php?'. $queryString);
