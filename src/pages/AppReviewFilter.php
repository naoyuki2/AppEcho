<?php
require_once '../components/Header.php';
?>

<form action="#" method="post">
    <div class="AppFilter-wrap">

        <!-- タグ -->
        <div class="AppFilter-content">
            <p class="AppFilter-subTitle">タグ</p>
            <div class="AppFilter-input">
                <?php
                for ($i = 1; $i <= 4; $i++) {
                ?>
                    <div class="AppFilter-category">
                        <input type="checkbox" name="category" class="btn-check" id="AppFilter-checkbox-category-<?php echo $i ?>" autocomplete="off" value="<?php $i ?>">
                        <label class="btn btn-outline-primary" for="AppFilter-checkbox-category-<?php echo $i ?>">カテゴリ名<?php echo $i ?></label>
                    </div>
                <?php
                    if ($i % 4 == 0) {
                        echo '</div><div class="AppFilter-input">';
                    }
                }
                ?>
            </div>
        </div>

        <!-- 評価 -->
        <div class="AppFilter-content">
            <div class="AppFilter-cautionary">
                <p class="AppFilter-subTitle">評価</p>
            </div>
            <div class="AppFilter-input">
                <div class="AppFilter-star">
                    <input type="checkbox" name="star" class="btn-check" id="AppFilter-checkbox-star-5" autocomplete="off" value="5">
                    <label class="btn btn-outline-primary" for="AppFilter-checkbox-star-5" onclick="toggleClass(this)"><i class="far fa-star"></i>5</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppFilter-checkbox-star-4" autocomplete="off" value="4">
                    <label class="btn btn-outline-primary" for="AppFilter-checkbox-star-4" onclick="toggleClass(this)"><i class="far fa-star"></i>4</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppFilter-checkbox-star-3" autocomplete="off" value="3">
                    <label class="btn btn-outline-primary" for="AppFilter-checkbox-star-3" onclick="toggleClass(this)"><i class="far fa-star"></i>3</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppFilter-checkbox-star-2" autocomplete="off" value="2">
                    <label class="btn btn-outline-primary" for="AppFilter-checkbox-star-2" onclick="toggleClass(this)"><i class="far fa-star"></i>2</label>

                    <input type="checkbox" name="star" class="btn-check" id="AppFilter-checkbox-star-1" autocomplete="off" value="1">
                    <label class="btn btn-outline-primary" for="AppFilter-checkbox-star-1" onclick="toggleClass(this)"><i class="far fa-star"></i>1</label>
                </div>
            </div>
        </div>

        <!-- 並び替え検索 -->
        <div class="AppFilter-content">
            <p class="AppFilter-subTitle">並び替え</p>
            <div class="AppFilter-input">
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
        <button type="submit" class="AppFilter-submit btn btn-outline-success">この条件で絞り込む</button>
    </div>
</form>

<script src="../features/AppFilter/AppFilter.js"></script>

<?php
require_once '../components/Footer.php';
?>