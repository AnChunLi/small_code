<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$lastid=$id-1;
	$exchangeid=10000;
	$sql0="UPDATE banner SET id='$exchangeid' WHERE id='$lastid'";
	$sql1="update banner set id='$lastid' WHERE id='$id'";
	$sql2="update banner set id='$id' WHERE id='$exchangeid'";
	$result0=$db->query($sql0);
	$result1=$db->query($sql1);
	$result2=$db->query($sql2);
	if($result0&&$result1&&$result2)
	{
		echo "<script>location.href='showbanner.php';</script>";
	}
	
?>