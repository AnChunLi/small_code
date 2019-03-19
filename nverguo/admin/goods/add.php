<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$name=$_POST['name'];
	$class=$_POST['class'];
	$brand=$_POST['brand'];
	$state=$_POST['state'];
	$price=$_POST['price'];
	$kucun=$_POST['kucun'];
	$details=$_POST['details'];
	$specification1=$_POST['specification'];
	$imagesrc=$_POST['imagesrc'];
	$sql1="INSERT INTO goods (name,class,brand,state,price,kucun,details,imagesrc,specification1) VALUES ('$name','$class','$brand','$state','$price','$kucun','$details','$imagesrc','$specification1')";
	$is1=$db->query($sql1);
	if($is1)
	{
		echo "<script>location.href='goods-list.php';</script>";
	}
?>