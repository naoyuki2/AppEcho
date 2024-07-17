// 新規登録・ユーザーネーム
const signUpName = document.getElementById("Auth-signUp-name");

signUpName.addEventListener('input', function () {   // 文字が入力されるたびに判定
    let input = this.value;

    if (input.length > 20) {
        input = input.slice(0, 20); // 20文字を超えた分は切り捨て
    }

    this.value = input;
});

// 新規登録・メールアドレス
const signUpMail = document.getElementById("Auth-signUp-mail");
const signUpMailError = document.getElementById("Auth-signUp-mailError");

signUpMail.addEventListener('blur', function () {    // 入力部分からフォーカスが外れたら判定
    const mail = this.value;

    // メールアドレスの形式チェック用正規表現
    const regex = /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;

    if (regex.test(mail) || mail.length == 0) {
        signUpMailError.innerText = "";
    } else {
        signUpMailError.innerText = "無効なメールアドレスです";
    }
});

// 新規登録・パスワード
const signUpPassword = document.getElementById("Auth-signUp-password");
const signUpPasswordError = document.getElementById("Auth-signUp-passwordError");

signUpPassword.addEventListener('blur', function () {
    const password = this.value;

    // パスワードの形式チェック用正規表現（半角英数のみ許可）
    const regex = /^[0-9a-zA-Z]*$/;

    if ((regex.test(password) && password.length >= 8) || password.length == 0) {
        signUpPasswordError.innerText = "";
    } else {
        signUpPasswordError.innerText = "不正なパスワードです";
    }
});

// 新規登録・フォーム送信
function signUpSend() {
    const form = document.forms["signUp"];
    const input = document.getElementsByClassName("Auth-signUpInput");
    const error = document.getElementsByClassName("Auth-signUpError");
    let inputFlg = false;
    let errorFlg = false;
    let flg = false;

    for (i = 0; i < input.length; i++) {    // 未入力判定
        if (input[i].value.length == 0) {
            inputFlg = true;
        }
    }

    for (i = 0; i < error.length; i++) {    // 不正項目判定
        if (error[i].innerText.length != 0) {
            errorFlg = true;
        }
    }

    if (inputFlg) {
        Swal.fire({
            icon: "warning",
            text: "未入力の項目があります！",
        });
    } else if (errorFlg) {
        Swal.fire({
            icon: "warning",
            text: "不正な項目があります！",
        });
    } else {
        Swal.fire({
            text: "現在の内容で登録します。よろしいですか？",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    icon: 'success',
                    text: '登録しました！'
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                });
            }
        });
    }
}

// 新規登録・パスワードのやつ
function signUpHidePass() {
    const password = document.getElementById("Auth-signUp-password");
    const buttonEye = document.getElementById("Auth-signUp-buttonEye");

    if (password.type == "text") {
        password.type = "password";
        buttonEye.className = "far fa-eye";
    } else {
        password.type = "text";
        buttonEye.className = "far fa-eye-slash";
    }
}

function loginSend() {
    const form = document.forms["login"];
    const input = document.getElementsByClassName("Auth-loginInput");
    let inputFlg = false;

    for (i = 0; i < input.length; i++) {
        if (input[i].value.length == 0) {
            inputFlg = true;
        }
    }

    if (inputFlg) {
        Swal.fire({
            icon: "warning",
            text: "未入力の項目があります！",
        });
    } else {
        form.submit();
    }
}

function loginHidePass() {
    const password = document.getElementById("Auth-login-password");
    const buttonEye = document.getElementById("Auth-login-buttonEye");

    if (password.type == "text") {
        password.type = "password";
        buttonEye.className = "far fa-eye";
    } else {
        password.type = "text";
        buttonEye.className = "far fa-eye-slash";
    }
}