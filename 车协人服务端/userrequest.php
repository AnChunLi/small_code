<?php
	include("config.php");
	$sql="select * from user  where id!=1 and shenhe='1' order by id desc";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$rows[]=$row;
	}
	echo json_encode($rows);
?>