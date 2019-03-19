<?php
	include("../../public/common/config.php");
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$sql="SELECT * FROM user";
	$result=$db->query($sql);
	while($row=$result->fetch_array())
	{
		if($username==$row['username'])
		{
				if($password==$row['password'])
				{
						session_start();
						$_SESSION['id']=$row['id'];
						$_SESSION['username']=$row['username'];
						header("Location:../../index.php");
				}
				else
				{
					echo "<script> alert('用户名或密码错误！');parent.location.href='Login.html'; </script>";
				}
		}
		else
		{
			echo "<script> alert('用户名或密码错误！');parent.location.href='Login.html'; </script>";
		}
	
	}
?>