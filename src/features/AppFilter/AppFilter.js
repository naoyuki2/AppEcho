function toggleClass(el) {
    const tag = el.getElementsByTagName('i')[0];
    const tagClass = tag.className;

    if (tagClass.includes("far")) {
        tag.classList.remove("far");
        tag.classList.add("fas");
    } else if (tagClass.includes("fas")) {
        tag.classList.remove("fas");
        tag.classList.add("far");
    }
}

window.onload = function () {
    const tagClassName = document.getElementsByClassName("AppFilter-tag");
    const labelClassName = document.getElementsByClassName("AppFilter-tagBtn");
    let color;

    for (let i = 0; i < tagClassName.length; i++) {
        color = tagClassName[i].value;
        labelClassName[i].style.cssText = `
            --bs-btn-color: #${color};
            --bs-btn-border-color: #${color};
            --bs-btn-hover-color: #fafafa;
            --bs-btn-hover-bg: #${color};
            --bs-btn-hover-border-color: #${color};
            --bs-btn-active-color: #fafafa;
            --bs-btn-active-bg: #${color};
            --bs-btn-active-border-color: #${color};
            --bs-btn-disabled-color: #${color};
            --bs-btn-disabled-border-color: #${color};
            --bs-gradient: none;
            border-radius: 20px;
            padding: .3rem .8rem;
            font-size: .8rem;
        `;

    }

    console.log(color);
}