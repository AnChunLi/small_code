<?php
	include("../../public/common/config.php");
	session_start();
	$userid=$_SESSION['id'];
	$text=$_POST['text'];
	$imagesrc=$_POST['imagesrc'];
	$intime=time();
	if($imagesrc=='../public/img/addimage.jpg')
	{
		$sql="insert into releases (userid,text,intime) values ('$userid','$text','$intime')";
		$is=$db->query($sql);
		if($is)
		{
			echo 1;
		}
	}
	else
	{
		$sql1="insert into releases (userid,text,intime,imagesrc) values ('$userid','$text','$intime','$imagesrc')";
		$is1=$db->query($sql1);
		if($is1)
		{
			echo 1;
		}
	}
?>