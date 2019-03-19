<?php
	include("../../public/common/config.php");
	session_start();
	$userid=$_SESSION['id'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$sql="update user set name='$name', gender='$gender',age='$age', address='$address', email='$email' where id='$userid'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='my.php';</script>";
	}
?>