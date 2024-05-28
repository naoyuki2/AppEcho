function toggleClass(el) {
    const tag = document.getElementById("modal-star").getElementsByTagName('i');
    
    for(var i = 0;i < tag.length;i++){
        const tagClass = tag[i].className;
        if(i == el){
            if(tagClass.includes("far")){
                tag[i].classList.remove("far");
                tag[i].classList.add("fas");
            }
        }else{
            if (tagClass.includes("fas")) {
                tag[i].classList.remove("fas");
                tag[i].classList.add("far");
            }
        }
    }
}

function tagBgChange(id){
    const target = document.getElementById("modal-tag").getElementsByTagName("label");
    for(var i = 0;i < target.length;i++){
        var tagColor = target[i].id;
        if(i + 1 == id){
            target[i].style.backgroundColor = tagColor;
            target[i].style.color = '#FAFAFA';
        }else{
            target[i].style.backgroundColor = '#FAFAFA';
            target[i].style.color = tagColor;
        }
    }
}