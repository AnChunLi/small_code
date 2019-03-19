<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$name=$_POST['name'];
	$class=$_POST['class'];
	$brand=$_POST['brand'];
	$state=$_POST['state'];
	$price=$_POST['price'];
	$sales=$_POST['sales'];
	$kucun=$_POST['kucun'];
	$details=$_POST['details'];
	$specification1=$_POST['specification'];
	$sql="UPDATE goods SET name='$name',class='$class' ,brand='$brand' ,state='$state' ,price='$price' ,sales='$sales' ,kucun='$kucun' ,details='$details',specification1='$specification1' WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='goods-list.php';</script>";
	}
?>