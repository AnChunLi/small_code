<?php
	include("../../config.php");
	include("../public/safe.php");
	$title=$_POST['title'];
	$starttime=$_POST['starttime'];
	$overtime=$_POST['overtime'];
	$place=$_POST['place'];
	$lat=$_POST['latitude'];
	$long=$_POST['longitude'];
	$text=$_POST['text'];
	$image=$_POST['imagesrc'];
	$sql="insert into training (title,starttime,overtime,place,latitude,longitude,text,image) values ('$title','$starttime','$overtime','$place','$lat','$long','$text','$image')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>alert('添加成功！');location.href='traininglist.php';</script>";
	}
?>