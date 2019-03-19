<?php
	include("../../public/common/config.php");
	$id=$_GET['id'];
	$sql="delete from receive where id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='my.php';</script>";
	}
?>