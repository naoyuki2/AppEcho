<?php
$appId = $_POST['appId'];
if(isset($_POST['tagId'])){
    $tagId = $_POST['tagId'];
}
if(isset($_POST['star'])){
    $star = $_POST['star'];
}
if(isset($_POST['tagdel'])){
    $tagdel = $_POST['tagdel'];
    $tagId = array_diff($tagId,array($tagdel));
    $tagId = array_values($tagId);
    if (is_array($tagId) && empty($tagId)) {
        $tagId = null;
    }
}
if(isset($_POST['stardel'])){
    $stardel = $_POST['stardel'];
    $star = array_diff($star,array($stardel));
    $star = array_values($star);
    if (is_array($star) && empty($star)) {
        $star = null;
    }
}
$queryString = null;

$queryString = http_build_query(['appId' => $appId]);
if(isset($tagId)){
    $queryString .= '&' . http_build_query(['tagId' => $tagId]);
}
if(isset($star)){
    $queryString .= '&' . http_build_query(['star' => $star]);
}

header('Location: ../../pages/user/AppReviews.php?'. $queryString);
?>