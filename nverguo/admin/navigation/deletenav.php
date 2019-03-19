<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="DELETE FROM navigation WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='shownav.php';</script>";
	}
?>