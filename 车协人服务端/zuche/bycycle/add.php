<?php
	include("../../config.php");
	include("../public/safe.php");
	$name=$_POST['name'];
	$image=$_POST['imagesrc'];
	$price=$_POST['price'];
	$zucheprice=$_POST['zucheprice'];
	$shop=$_POST['shop'];
	$tel=$_POST['tel'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];
	$num=$_POST['num'];
	$sql="insert into bycycle (name,image,price,zucheprice,shop,tel,latitude,longitude,num,remain) values ('$name','$image','$price','$zucheprice','$shop','$tel','$latitude','$longitude','$num','$num')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='showbycycle.php';</script>";
	}
?>