<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="DELETE FROM training WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='traininglist.php';</script>";
	}
?>