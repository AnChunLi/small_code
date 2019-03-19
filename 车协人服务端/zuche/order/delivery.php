<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$bycycleid=$_GET['bycycleid'];
	$time=time()+8*3600;
	$sql="UPDATE zucheindent SET state='1',zuchetime='$time' WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		$sql1="update bycycle set remain=remain-1 where id='$bycycleid'";
		$db->query($sql1);
		echo "<script>location.href='showorder.php';</script>";
	}
?>