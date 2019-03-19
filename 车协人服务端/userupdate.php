<?php
	include("config.php");
	$id=$_GET['id'];
	$school=$_POST['school'];
	$grade=$_POST['grade'];
	$tel=$_POST['tel'];
	$qq=$_POST['qq'];
	$sushe=$_POST['sushe'];
	$image=$_POST['imagesrc'];
	if($image=='')
	{
		$sql="update user set school='$school',grade='$grade',tel='$tel',qq='$qq',sushe='$sushe' where id='$id'";
		$db->query($sql);
	}
	else
	{
		$sql1="update user set school='$school',grade='$grade',tel='$tel',qq='$qq',sushe='$sushe',schoolcard='$image' where id='$id'";
		$db->query($sql1);
	}
?>