<?php
	include("../../public/common/config.php");
	$username=$_POST['adminusername'];
	$password=md5($_POST['password']);
	$sql="SELECT * FROM adminuser";
	$result=$db->query($sql);
	while($row=$result->fetch_array())
	{
		if($username==$row['adminusername'])
		{
			if($password==$row['password'])
			{
				session_start();
				$_SESSION['adminid']=$row['id'];
				$_SESSION['adminusername']=$row['adminusername'];
				header("Location:../admin.php");
			}
			else
			{
				echo "<script> alert('密码错误！');parent.location.href='../index.html'; </script>";
			}
		}
		
		else
		{
			echo "<script> alert('用户不存在！');parent.location.href='../index.html'; </script>";
		}
	
	}
?>