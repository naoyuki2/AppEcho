<?php
require_once '../components/Header.php';
?>

<form action="#" method="post">
    <div class="AppSearch-wrap">

        <!-- アプリ名検索 -->
        <div class="AppSearch-content">
            <p class="AppSearch-subTitle">アプリ名</p>
            <input type="text" name="AppName" class="AppSearch-text" placeholder="アプリ名を入力" size="30">
        </div>

        <!-- カテゴリ検索 -->
        <div class="AppSearch-content">
            <p class="AppSearch-subTitle">カテゴリ</p>
            <div class="AppSearch-input">
                <?php
                for ($i = 1; $i <= 4; $i++) {
                ?>
                    <div class="AppSearch-category">
                        <input type="checkbox" name="category" class="btn-check" id="AppSearch-checkbox-category-<?php echo $i ?>" autocomplete="off" value="<?php $i ?>">
                        <label class="btn btn-outline-primary" for="AppSearch-checkbox-category-<?php echo $i ?>">カテゴリ名<?php echo $i ?></label>
                    </div>
                <?php
                    if ($i % 4 == 0) {
                        echo '</div><div class="AppSearch-input">';
                    }
                }
                ?>
            </div>
        </div>

        <!-- 平均評価検索 -->
        <div class="AppSearch-content">
            <div class="AppSearch-cautionary">
                <p class="AppSearch-subTitle">平均評価</p>
                <span class="AppSearch-span">※小数点以下は四捨五入</span>
            </div>
            <div class="AppSearch-input">
                <div class="AppSearch-star">
                    <input type="checkbox" name="star" class="btn-check" id="AppSearch-checkbox-star-5" autocomplete="off" value="5">
                    <label class="btn btn-outline-primary" for="AppSearch-checkbox-star-5" onclick="toggleClass(this)"><i class="far fa-star"></i>5</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppSearch-checkbox-star-4" autocomplete="off" value="4">
                    <label class="btn btn-outline-primary" for="AppSearch-checkbox-star-4" onclick="toggleClass(this)"><i class="far fa-star"></i>4</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppSearch-checkbox-star-3" autocomplete="off" value="3">
                    <label class="btn btn-outline-primary" for="AppSearch-checkbox-star-3" onclick="toggleClass(this)"><i class="far fa-star"></i>3</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppSearch-checkbox-star-2" autocomplete="off" value="2">
                    <label class="btn btn-outline-primary" for="AppSearch-checkbox-star-2" onclick="toggleClass(this)"><i class="far fa-star"></i>2</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppSearch-checkbox-star-1" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="AppSearch-checkbox-star-1" onclick="toggleClass(this)"><i class="far fa-star"></i>1</label>
                </div>
            </div>
        </div>

        <!-- 並び替え検索 -->
        <div class="AppSearch-content">
            <p class="AppSearch-subTitle">並び替え</p>
            <div class="AppSearch-input">
                <select class="form-select">
                    <option value="0" selected>選択なし</option>
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                    ?>
                        <option value="<?php echo $i ?>">並び替え条件<?php echo $i ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <button type="submit" class="AppSearch-submit btn btn-outline-success">この条件で絞り込む</button>
    </div>
</form>

<script src="../features/AppSearch/AppSearch.js"></script>

<?php
require_once '../components/Footer.php';
?>