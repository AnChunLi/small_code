<?php
	include("config.php");
	$userid=$_GET['id'];
	$sql="select * from zucheindent where userid='$userid' order by id desc";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$time=date('Y-m-d H:i',$row['time']);
		$zuchetime=date('Y-m-d H:i',$row['zuchetime']);
		$finishtime=date('Y-m-d H:i',$row['finishtime']);
		$state=$row['state'];
		$text=$row['during'];
		$r=array("$text","$time","$finishtime","$zuchetime","$state");
		$rows[]=$r;
	}
	echo json_encode($rows);
?>