<?php
	include("../../../public/common/config.php");
	include("../../public/safe.php");
	$name=$_POST['name'];
	$classid=$_POST['class'];
	$sql="INSERT INTO specificationlist (name,classid) VALUES ('$name','$classid')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='../show.php';</script>";
	}
?>