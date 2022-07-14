<?php

header('Content-Type: text/html; charset=utf-8');

$db = mysqli_connect('localhost','root','5876','level1');
$db->set_charset("utf8");

if(!$db)
{
    echo "DB접속 실패";
}

function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}


?>