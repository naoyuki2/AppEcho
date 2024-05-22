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