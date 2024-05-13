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