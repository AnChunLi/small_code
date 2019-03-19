<?php
	include("../../config.php");
	include("safe.php");
	$id=$_SESSION['id'];
	$password=md5($_POST['password']);
	$password2=md5($_POST['password2']);
	if($password==$password2)
	{
		$sql="UPDATE zucheadmin SET password = '$password' WHERE id='$id'";
		$is=$db->query($sql);
		if($is)
		{
			echo "<script>alert('修改成功！');</script>";
		}
	}
	else
	{
		echo "<script>alert('输入密码不一致，请重新输入！');location.href='updatepwd.html';</script>";
	}

?>