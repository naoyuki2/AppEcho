<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
?>

<form action="../../features/AppRequest/postRequest.php" method="post">
    <div class="ReviewRequest-main" align="center">
        <h3>スレッドを立ててほしいアプリ名</h3>
        <input type="text" name="request" size="40" maxlength="20"/>
        <div class="ReviewRequest-pad-top">
            <input type="submit" value="申請" class="ReviewRequest-btn">
        </div>
    </div>
</form>