<?php require_once dirname(__FILE__, 3) . '/components/Header.php' ?>

<div class="Auth-wrap">
    <ul class="nav nav-tabs nav-fill Auth-nav" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">ログイン</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="signUp-tab" data-bs-toggle="tab" data-bs-target="#signUp-tab-pane" type="button" role="tab" aria-controls="signUp-tab-pane" aria-selected="false">新規登録</button>
        </li>
    </ul>

    <div class="tab-content Auth-tab-content">
        <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab-pane" tabindex="0">
            <form action="#" method="post">
                <div class="Auth-inputContent">
                    <p class="Auth-label">メールアドレス</p>
                    <input type="email" name="email" class="Auth-email" size="30">
                </div>

                <div class="Auth-inputContent">
                    <p class="Auth-label">パスワード</p>
                    <input type="password" name="password" class="Auth-password" size="30">
                </div>

                <button type="submit" class="btn btn-outline-success Auth-submit">ログイン</button>
            </form>
        </div>

        <div class="tab-pane fade" id="signUp-tab-pane" role="tabpanel" aria-labelledby="signUp-tab-pane" tabindex="0">
            <form action="#" method="post">
                <div class="Auth-inputContent">
                    <p class="Auth-label">ユーザーネーム</p>
                    <input type="text" name="text" class="Auth-text" size="30">
                </div>

                <div class="Auth-inputContent">
                    <p class="Auth-label">メールアドレス</p>
                    <input type="email" name="email" class="Auth-email" size="30">
                </div>

                <div class="Auth-inputContent">
                    <p class="Auth-label">パスワード</p>
                    <input type="password" name="password" class="Auth-password" size="30">
                </div>

                <button type="submit" class="btn btn-outline-success Auth-submit">新規登録</button>
            </form>
        </div>
    </div>
</div>

<?php require_once dirname(__FILE__, 3) . '/components/Footer.php' ?>