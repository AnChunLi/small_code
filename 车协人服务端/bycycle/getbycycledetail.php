<?php
	include("../config.php");
	$id=$_GET['id'];
	$sql="select * from bycycle where id='$id'";
	$row=$db->query($sql)->fetch_array();
	echo json_encode($row);
?>