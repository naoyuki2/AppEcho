function logoutCheck() {
    const check = confirm("ログアウトしますか？");

    if (check) {
        location.href = "../../features/auth/SignOut.php";
    }
}