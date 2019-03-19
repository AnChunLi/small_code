<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="delete from tuozhan where id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='tuozhan.php';</script>";
	}
?>