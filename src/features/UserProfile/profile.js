function logoutCheck() {
    Swal.fire({
        text: "ログアウトしますか？",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                icon: 'success',
                text: 'ログアウトしました！'
            }).then((result) => {
                if (result.value) {
                    location.href = "../../features/auth/SignOut.php";
                }
            });
        }
    });
}