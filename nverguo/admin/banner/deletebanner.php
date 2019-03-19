<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="DELETE FROM banner WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='showbanner.php';</script>";
	}
?>