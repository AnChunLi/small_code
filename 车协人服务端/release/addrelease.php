<?php
	include("../config.php");
	$text=$_POST['text'];
	$userid=$_POST['userid'];
	$image=$_POST['image'];
	$time=time();
	$sql="insert into releases (userid,text,intime,imagesrc) values ('$userid','$text','$time','$image') ";
	$db->query($sql);
?>