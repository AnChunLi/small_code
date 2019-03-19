<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$id =$_GET['id'];
	$query = "select * from brand where id='$id'";
	$result1 = $db->query($query);
	$row1=$result1->fetch_array();
	$data = $row1['logo'];
	$type = $row1['logotype'];
	Header( "Content-type: $type");
	echo $data;
?>