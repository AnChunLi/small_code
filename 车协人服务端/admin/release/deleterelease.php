<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="DELETE FROM releases WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='release.php';</script>";
	}
?>