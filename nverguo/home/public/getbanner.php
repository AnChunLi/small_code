<?php
	include("../../public/common/config.php");
	$id =$_GET['id'];
	$query = "select * from banner where id='$id'";
	$result1 = $db->query($query);
	$row1=$result1->fetch_array();
	$data = $row1['img'];
	$type = $row1['imgtype'];
	Header( "Content-type: $type");
	echo $data;
?>