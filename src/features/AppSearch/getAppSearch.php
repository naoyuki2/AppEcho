<?php
require_once dirname(__FILE__, 4) . '/config/db_connect.php';

function getAppSearch($text, $category, $star, $sort)
{
    global $pdo;
    $sql = $pdo->query('
        SELECT app.id, app.name, app.image_url, app.keyword, category.name AS category_name, ROUND(AVG(review.star)) AS star
            FROM app
            INNER JOIN category
            ON app.category_id = category.id
            LEFT JOIN review
            ON app.id = review.app_id
            GROUP BY app.id, app.name, app.image_url, app.keyword, category_name
        ');
    $AppSearch = $sql->fetchAll();

    // 初期化
    $appId_text = [];
    $appId_category = [];
    $appId_star = [];
    $cnt = ['app_text' => false, 'app_category' => false, 'app_star' => false];

    foreach ($AppSearch as $app) {
        // アプリ名
        if ($text != 0) {
            if (is_array($text)) {
                $split = $text;
            } else {
                // カンマもしくは空白で分割
                $pattern = "/[\s,、]/";
                $split = preg_split($pattern, $text);
            }

            // キーワードリストに存在するか
            $keyword = json_decode($app['keyword'], true);

            // 配列splitの内容が配列keywordに存在するか
            if (array_intersect($split, $keyword)) {
                array_push($appId_text, $app['id']);
                $cnt['app_text'] = true;
            }
        }

        // カテゴリー
        if ($category != 0) {
            if (in_array($app['category_name'], $category)) {
                array_push($appId_category, $app['id']);
                $cnt['app_category'] = true;
            }
        } else {
            array_push($appId_category, 0);
        }

        // 平均評価
        if ($star != 0) {
            if (in_array($app['star'], $star)) {
                array_push($appId_star, $app['id']);
                $cnt['app_star'] = true;
            }
        } else {
            array_push($appId_star, 0);
        }
    }

    $appId = [];

    if ($text == 0 && $category == 0  && $star == 0) {
        if ($sort != 0) {
            return "sort";
        } else {
            return -1;
        }
    } else {
        if ($cnt['app_text']) {
            $intersection = $appId_text;

            if ($cnt['app_category']) {
                $intersection = array_intersect($intersection, $appId_category);
            }

            if ($cnt['app_star']) {
                $intersection = array_intersect($intersection, $appId_star);
            }

            if (!empty($intersection)) {
                array_push($appId, $intersection);
            } else {
                $appId = 0; // 該当なし
            }
        } else if ($cnt['app_category']) {
            $intersection = $appId_category;

            if ($cnt['app_star']) {
                $intersection = array_intersect($intersection, $appId_star);
            }

            if (!empty($intersection)) {
                array_push($appId, $intersection);
            } else {
                $appId = 0; // 該当なし
            }
        } else {
            if ($cnt['app_star']) {
                array_push($appId, $appId_star);
            } else {
                $appId = 0;    // ひとつも選択されていないので全件取得
            }
        }

        return $appId;
    }
}
