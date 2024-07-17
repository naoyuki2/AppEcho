function userIconPrev(el) {
    const id = document.getElementById("preview");
    let data = new FileReader();

    data.onload = function () {
        id.src = data.result;
        id.style.display = "block";
    };
    data.readAsDataURL(el.files[0]);
}

const userName = document.getElementById("EditProfile-userName");
userName.addEventListener('input', function () {
    let input = this.value;

    if (input.length > 20) {
        input = input.slice(0, 20);
    }

    this.value = input;
})

const userEmail = document.getElementById("EditProfile-email");
const emailErrorContent = document.getElementById("EditProfile-mailError");
userEmail.addEventListener('blur', function () {
    const mail = this.value;
    const regex = /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;

    if (regex.test(mail) || mail.length == 0) {
        emailErrorContent.innerText = "";
    } else {
        emailErrorContent.innerText = "無効なメールアドレスです";
    }
})

function EditProfile() {
    const form = document.forms["EditProfile-form"];
    const input = document.getElementsByClassName("EditProfile-input");
    const error = document.getElementById("EditProfile-mailError");
    let inputFlg = false;
    let errorFlg = false;

    for (i = 0; i < input.length; i++) {
        if (input[i].value.length == 0) {
            inputFlg = true;
        }
    }

    if (error.innerText.length != 0) {
        errorFlg = true;
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

const checkBox = document.getElementById("flexSwitchCheckDefault");
const label = document.getElementById("EditProfile-isAnonymous-label");
checkBox.addEventListener('change', function () {
    if (this.checked == false) {
        label.innerText = "OFF";
    } else {
        label.innerText = "ON";
        this.value = "1";
    }
})