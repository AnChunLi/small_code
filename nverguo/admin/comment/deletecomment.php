<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="DELETE FROM comment WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='showcomment.php';</script>";
	}
?>