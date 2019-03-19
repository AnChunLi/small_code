<?php
	include("../../public/common/config.php");
	session_start();
	$userid=$_SESSION['id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$tel=$_POST['tel'];
	$sql="insert into receive (name,address,tel,userid) values ('$name','$address','$tel','$userid')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>alert('添加成功！');location.href='my.php';</script>";
	}
?>