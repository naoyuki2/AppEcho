<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
$isSignUp = isset($_GET['signUp']) && $_GET['signUp'] == true;
?>

<div class="Auth-wrap">
    <ul class="nav nav-tabs nav-fill Auth-nav" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $isSignUp ? '' : 'active' ?>" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">ログイン</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $isSignUp ? 'active' : '' ?>" id="signUp-tab" data-bs-toggle="tab" data-bs-target="#signUp-tab-pane" type="button" role="tab" aria-controls="signUp-tab-pane" aria-selected="false">新規登録</button>
        </li>
    </ul>

    <div class="tab-content Auth-tab-content">
        <div class="tab-pane fade<?php echo $isSignUp ? '' : 'show active' ?>" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab-pane" tabindex="0">
            <form action="../../features/auth/SignIn.php" method="post" name="login">
                <div class="Auth-inputContent">
                    <p class="Auth-label">メールアドレス</p>
                    <input type="email" name="email" class="Auth-email Auth-loginInput" size="30">
                </div>

                <div class="Auth-inputContent">
                    <p class="Auth-label">パスワード</p>
                    <input type="password" name="password" class="Auth-password Auth-loginInput" id="Auth-login-password" size="30">
                    <span class="far fa-eye" id="Auth-login-buttonEye" onclick="loginHidePass()"></span>
                </div>

                <div class="Auth-inputContent">
                    <p id="Auth-signIn-dbError">
                        <?php
                        if (isset($_SESSION['signin-error'])) {
                            echo $_SESSION['signin-error'];
                            unset($_SESSION['signin-error']);
                        }
                        ?>
                    </p>
                </div>

                <button type="button" class="btn btn-outline-success Auth-submit" onclick="loginSend()">ログイン</button>
            </form>
        </div>

        <div class="tab-pane fade <?php echo $isSignUp ? 'show active' : '' ?>" id="signUp-tab-pane" role="tabpanel" aria-labelledby="signUp-tab-pane" tabindex="0">
            <form action="../../features/auth/SignUp.php" method="post" name="signUp">
                <div class="Auth-inputContent">
                    <p class="Auth-label">ユーザーネーム</p>
                    <input type="text" name="signUpUserName" class="Auth-text Auth-signUpInput" id="Auth-signUp-name" size="30" placeholder="20文字以内">
                </div>

                <div class="Auth-inputContent">
                    <p class="Auth-label">メールアドレス</p>
                    <input type="email" name="signUpEmail" class="Auth-email Auth-signUpInput" id="Auth-signUp-mail" size="30">
                </div>

                <div class="Auth-inputContent">
                    <p class="Auth-label">パスワード</p>
                    <input type="password" name="signUpPassword" class="Auth-password Auth-signUpInput" id="Auth-signUp-password" size="30" placeholder="半角英数8文字以上">
                    <span class="far fa-eye" id="Auth-signUp-buttonEye" onclick="signUpHidePass()"></span>
                </div>

                <div class="Auth-inputContent">
                    <p id="Auth-signUp-dbError">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </p>
                    <p class="Auth-signUpError" id="Auth-signUp-mailError"></p>
                    <p class="Auth-signUpError" id="Auth-signUp-passwordError"></p>
                </div>

                <button type="button" class="btn btn-outline-success Auth-submit" onclick="signUpSend()">新規登録</button>
            </form>
        </div>
    </div>
</div>

<script src="../../features/auth/userAuth.js"></script>

<?php require_once dirname(__FILE__, 3) . '/components/Footer.php' ?>