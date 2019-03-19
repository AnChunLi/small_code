<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$name=$_POST['name'];
	$sql="INSERT INTO specification (name) VALUES ('$name')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='show.php';</script>";
	}
?>