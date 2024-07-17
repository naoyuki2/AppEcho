function textCancel(el) {
    const form = document.forms["tagForm"];

    const className = document.getElementsByClassName("AppList-btn-text");
    const removeInput = className[el];

    removeInput.parentNode.removeChild(removeInput);
    form.submit();
}

function starCancel(el) {
    const form = document.forms["tagForm"];

    const className = document.getElementsByClassName("AppList-btn-star");
    const removeInput = className[el];

    removeInput.parentNode.removeChild(removeInput);
    form.submit();
}

function categoryCancel(el) {
    const form = document.forms["tagForm"];

    const className = document.getElementsByClassName("AppList-btn-category");
    const removeInput = className[el];

    removeInput.parentNode.removeChild(removeInput);
    form.submit();
}

function allClear() {
    const form = document.forms["tagForm"];

    form.action = "./AppList.php";
    form.submit();
}

const swiper = new Swiper('.swiper-main', {
    loop: false,
    pagination: {
        el: '.swiper-pagination-main',
        clickable: true,
    }
});

function transition() {
    const link = "./AppRandomView.php";
    const animation_id = document.getElementById("AppList-animation");
    const loading_id = document.getElementById("AppList-loading");

    animation_id.classList.add("AppList-animation-bg");
    setTimeout(function () {
        loading_id.classList.add("AppList-loader");
    }, 500);
    setTimeout(function () {
        location.href = link;
    }, 2000);
}