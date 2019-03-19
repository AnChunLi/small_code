<?php
	include("../config.php");
	$sql="select * from bycycle order by id desc";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$rows[]=$row;
	}
	echo json_encode($rows);
?>