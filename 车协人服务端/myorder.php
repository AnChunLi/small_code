<?php
	include("config.php");
	$userid=$_GET['id'];
	$sql="select * from indent where userid='$userid' order by id desc";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$time=date('Y-m-d H:i',$row['time']+8*3600);
		$finishtime=date('Y-m-d H:i',$row['finishtime']+8*3600);
		$finish=$row['finish'];
		$text=$row['text'];
		$r=array("$text","$time","$finishtime","$finish");
		$rows[]=$r;
	}
	echo json_encode($rows);
?>