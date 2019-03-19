<?php
	include("config.php");
	$id=$_GET['id'];
	$sql="select * from user where id='$id'";
	$result=$db->query($sql);
    $row=$result->fetch_array();
	echo json_encode($row);
?>