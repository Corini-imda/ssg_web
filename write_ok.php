<?php

include('db.php');

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];

$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}
$tmpfile =  $_FILES['file']['tmp_name'];
$o_name = $_FILES['file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
$folder = "./upload/".$filename;
move_uploaded_file($tmpfile,$folder);


if($username && $userpw && $title && $content){
    $sql = mq("insert into board(mb_nick,password,title,content,file) values('".$username."','".$userpw."','".$title."','".$content."','".$o_name."')"); 
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='main_view.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>