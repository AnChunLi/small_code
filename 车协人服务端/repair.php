<?php
	include("config.php");
	$id=$_GET['id'];
	$text=$_POST['text'];
	$time=time();
	$sql="insert into indent (userid,text,time) values ('$id','$text','$time')";
	$db->query($sql);
?>