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

function reviewCheck(id){
    var flag1 = false;
    var flag2 = false;
    var star = document.getElementsByName('star');
    var tag = document.getElementsByName('tagId');
    var text = document.getElementById('reviewarea');

    for(var i = 0; i < star.length;i++){
        if(star.item(i).checked){
            flag1 = true;
        }
    }

    for(var j = 0; j < tag.length;j++){
        if(tag.item(j).checked){
            flag2 = true;
        }
    }

    if(!flag1 || !flag2 || text.value==""){
        alert("未入力の項目があります！");
    }else{
        var form = document.getElementById('AppReviews-form');
        var formData = new FormData(form);
        var action = form.getAttribute("action");
        var options = {
            method: 'POST',
            body:formData,
        }
        fetch(action,options).then((e) => {
            if(e.status === 200){
                location.href = "AppReviews.php?appId="+id;
                return
            }
        })
    }
}