<?php require_once dirname(__FILE__, 3) . '/components/Header.php' ?>

<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] === false) {
    ?>
    <p>ログインに失敗しました</p>
    <?php
}
?>

<form action="../../features/auth/admin.php" method="post">
    <input type="password" name="password">
    <button type="submit">ログイン</button>
</form>

<?php require_once dirname(__FILE__, 3) . '/components/Footer.php' ?>