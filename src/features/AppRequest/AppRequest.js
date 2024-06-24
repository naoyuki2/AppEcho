function RequestDest(id){
    confirm("本当に破棄してもよろしいですか？");
    location.href="../../features/AppRequest/UpdateRequest.php?reqId="+id;
}