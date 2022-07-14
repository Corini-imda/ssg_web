<?php
include('db.php');

$bno = $_GET['idx'];
$username = $_POST['mb_nick'];
$userpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$sql = mq("update board set mb_nick='".$username."',password='".$userpw."',title='".$title."',content='".$content."' where idx='".$bno."'"); ?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=read.php?idx=<?php echo $bno; ?>">