<?php
	include("../../public/common/config.php");
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$tel=$_POST['phone'];
	$sql="insert into user (username,password,tel) values ('$username','$password','$tel')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>alert('注册成功！');location.href='../login/Login.html'</script>";
	}	
?>