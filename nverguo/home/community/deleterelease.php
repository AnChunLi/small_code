<?php
	include("../../public/common/config.php");
	$id=$_GET['releaseid'];
	$sql="delete from releases where id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='myrelease.php';</script>";
	}
?>