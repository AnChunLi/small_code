<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="UPDATE indent SET state='4' WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='showindent.php';</script>";
	}
?>