function RequestDest(id){
    confirm("本当に破棄してもよろしいですか？");
    location.href="../../features/AppRequest/UpdateRequest.php?reqId="+id+"&judge=dest";
}

function RequestAccept(id){
    confirm("本当に受理してもよろしいですか？");
    location.href="../../features/AppRequest/UpdateRequest.php?reqId="+id+"&judge=accept";
}