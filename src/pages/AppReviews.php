<?php
    require_once '../components/Header.php';
    require_once '../features/AppReviews/getReviews.php';
    $appId = $_GET['appId'];
    $Reviews = getReviews($appId);
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
    <i class="AppReviews-plus fa-solid fa-plus"></i>
</button>

<!-- モーダルの内容 -->
<form action="../features/AppReviews/postReview.php?appId=<?php echo $appId; ?>" method="post">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">レビュー投稿</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="AppReviews-subtitle"><h4>評価</h4></div>
        <div class="AppReviews-modal-star" id="modal-star">
            <input value="1" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-1">
            <label for="AppReviews-star-1" class="AppReviews-radio-label" id=1 onclick="toggleClass(0)"><i class="far fa-star"></i>1</label>
            <input value="2" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-2">
            <label for="AppReviews-star-2" class="AppReviews-radio-label" id=2 onclick="toggleClass(1)"><i class="far fa-star"></i>2</label>
            <input value="3" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-3">
            <label for="AppReviews-star-3" class="AppReviews-radio-label" id=3 onclick="toggleClass(2)"><i class="far fa-star"></i>3</label>
            <input value="4" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-4">
            <label for="AppReviews-star-4" class="AppReviews-radio-label" id=4 onclick="toggleClass(3)"><i class="far fa-star"></i>4</label>
            <input value="5" type="radio" class="AppReviews-radio-star" name="star" id="AppReviews-star-5">
            <label for="AppReviews-star-5" class="AppReviews-radio-label" id=5 onclick="toggleClass(4)"><i class="far fa-star"></i>5</label>
        </div>
        <div class="AppReviews-subtitle"><h4>タグ</h4></div>
        <div class="AppReviews-modal-tag">
          <?php foreach($GetTags as $tagModal){ ?>
            <input type="radio" class="AppReviews-radio-tag" name="tag">
            <label for="AppReviews-tag-label" class="AppReviews-radio-label" id="#<?php echo $tagModal['color'] ?>" 
            style="color: #<?php echo $tagModal['color'] ?>; border-color: #<?php echo $tagModal['color'] ?>;"
            onclick="tagBgChange(<?php echo $tagModal['id']?>)"><?php echo $tagModal['name'] ?></label>
          <?php } ?>
        </div>
        <div class="AppReviews-subtitle"><h4>レビュー</h4></div>
        <div><input type="text" class="AppReviews-review" name="content" id="" placeholder="入力してください"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="AppReviews-post" data-bs-dismiss="modal" aria-label="Close">投稿する</button>
      </div>
    </div>
  </div>
</div>
</form>

<script src="../features/AppReviews/AppReviews-modal-star.js"></script>

<?php
    require_once '../components/Footer.php';
?>