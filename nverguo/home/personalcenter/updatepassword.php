<?php
	include("../../public/common/config.php");
	$password=md5($_POST['password']);
	$sql="update user set password='$password'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>alert('密码修改成功，请重新登录！');parent.location.href='../login/Login.html';</script>";
	}
?>