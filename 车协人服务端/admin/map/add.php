<?php
	include("../../config.php");
	include("../public/safe.php");
	$name=$_POST['name'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];
	$sql="insert into map (name,latitude,longitude) values ('$name','$latitude','$longitude')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='showmap.php';</script>";
	}
?>