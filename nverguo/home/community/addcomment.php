<?php
	include("../../public/common/config.php");
	session_start();
	if(isset($_SESSION['id']))
	{
		$userid=$_SESSION['id'];
		$id=$_GET['id'];
		$comment=$_POST['comment'];
		$time=time();
		$sql="insert into comment (text,release_id,userid,intime) values ('$comment','$id','$userid','$time')";
		$is=$db->query($sql);
		if($is)
		{
			echo "<script>location.href='everyrelease.php?releaseid='+$id;</script>";
		}
	}
	else
	{
		echo "<script>location.href='../login/Login.html';</script>";
	}
?>