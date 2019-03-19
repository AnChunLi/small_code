<?php
	include("../../config.php");
	include("../public/safe.php");
	$adminusername=$_POST['adminusername'];
	$password=md5($_POST['password']);
	$password2=md5($_POST['password2']);
	$name=$_POST['name'];
	if($password==$password2)
	{
		$sql="INSERT INTO zucheadmin (adminusername, password, name) VALUES ('$adminusername', '$password', '$name')";
		$is=$db->query($sql);
		if($is)
		{
			echo "<script>location.href='adminuser.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('输入密码不一致，请重新输入！');location.href='addadminform.php';</script>";
	}
	
	
?>

