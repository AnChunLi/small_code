<?php
	include("../../config.php");
	$username=$_POST['adminusername'];
	$password=md5($_POST['password']);
	$sql="SELECT * FROM zucheadmin";
	$result=$db->query($sql);
	while($row=$result->fetch_array())
	{
		if($username==$row['adminusername'])
		{
			if($password==$row['password'])
			{
				session_start();
				$_SESSION['id']=$row['id'];
				$_SESSION['username']=$row['adminusername'];
				header("Location:../menu.php");
			}
			else
			{
				echo "<script> alert('密码错误！');parent.location.href='../index.php'; </script>";
			}
		}
		
		else
		{
			echo "<script> alert('用户不存在！');parent.location.href='../index.php'; </script>";
		}
	
	}
?>