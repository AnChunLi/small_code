<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$name=$_POST['name'];
	$sql1="INSERT INTO class (name) VALUES ('$name')";
	$is=$db->query($sql1);
	if($is)
	{
		echo "<script>location.href='class.php';</script>";
	}
?>