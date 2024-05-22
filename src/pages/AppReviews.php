<?php
    require_once '../components/Header.php';
    require_once '../features/AppReviews/getReviews.php';
    $Reviews = getReviews($_GET['appId']);
?>

<?php foreach($Reviews as $review){ ?>
    <div class="AppReviews-box">
        <span class="AppReviews-number">No.<?php echo $review['id'] ?></span>
        <span class="AppReviews-point"><i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <?php echo $review['star'] ?>
        </span>
        <span class="AppReviews-tag" style="color: #<?php echo $review['tag_color'] ?>;
        border-color: #<?php echo $review['tag_color'] ?>;">
            <?php echo $review['tag_name'] ?>
        </span>
        <p class="AppReviews-comment">
            <?php echo $review['content'] ?>
        </p>
        <div class="AppReviews-date">
            <?php echo $review['post_date'] ?>
        </div>
    </div>
<?php } ?>

<!-- モーダルを開くボタン -->
<button type="button" class="btn btn-primary" id="AppReviews-openmodal" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="AppReviews-plus fa-solid fa-plus fa-3x"></i>
</button>

<!-- モーダルの内容 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">レビュー投稿</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="AppReviews-subtitle"><h4>評価</h4></div>
        <div class="AppReviews-modal-star">
            <input type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-1">
            <label for="AppReviews-star-1" class="AppReviews-radio-label" onclick="toggleClass(this)"><i class="far fa-star"></i>1</label>
            <input type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-2">
            <label for="AppReviews-star-2" class="AppReviews-radio-label" onclick="toggleClass(this)"><i class="far fa-star"></i>2</label>
            <input type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-3">
            <label for="AppReviews-star-3" class="AppReviews-radio-label" onclick="toggleClass(this)"><i class="far fa-star"></i>3</label>
            <input type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-4">
            <label for="AppReviews-star-4" class="AppReviews-radio-label" onclick="toggleClass(this)"><i class="far fa-star"></i>4</label>
            <input type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-5">
            <label for="AppReviews-star-5" class="AppReviews-radio-label" onclick="toggleClass(this)"><i class="far fa-star"></i>5</label>
        </div>
        <div class="AppReviews-subtitle"><h4>タグ</h4></div>
        <div class="AppReviews-modal-tag">
            <input type="radio" class="AppReviews-radio-tag" name="tag" id="AppReviews-impression">
            <label for="AppReviews-impression" class="AppReviews-radio-label-impression">感想</label>
            <input type="radio" class="AppReviews-radio-tag" name="tag" id="AppReviews-improve">
            <label for="AppReviews-improve" class="AppReviews-radio-label-improve">改善提案</label>
            <input type="radio" class="AppReviews-radio-tag" name="tag" id="AppReviews-question">
            <label for="AppReviews-question" class="AppReviews-radio-label-question">質問</label>
            <input type="radio" class="AppReviews-radio-tag" name="tag" id="AppReviews-answer">
            <label for="AppReviews-answer" class="AppReviews-radio-label-answer">回答</label>
        </div>
        <div class="AppReviews-subtitle"><h4>レビュー</h4></div>
        <div><input type="text" class="AppReviews-review" name="review" id="" placeholder="入力してください"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="AppReviews-post" data-bs-dismiss="modal" aria-label="Close">投稿する</button>
      </div>
    </div>
  </div>
</div>

<script src="../features/AppSearch/AppSearch.js"></script>

<?php
    require_once '../components/Footer.php';
?>