<?php
	include("config.php");
	$userid=$_GET['id'];
	$pwd=md5($_POST['pwd']);
	$sql="update user set password='$pwd' where id='$userid'";
	$db->query($sql);
?>