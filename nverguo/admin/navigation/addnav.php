<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$navtitle=$_POST['navtitle'];
	$src=$_POST['address'];
	$sql="INSERT INTO navigation (navtitle,address) VALUES ('$navtitle','$src')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='shownav.php';</script>";
	}
?>