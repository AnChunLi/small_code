<?php
	include("../config.php");
	$sql="select * from releases order by id desc";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$userid=$row['userid'];
		$sql="select * from user where id='$userid'";
		$userrow=$db->query($sql)->fetch_array();
		$name=$userrow['name'];
		$time=date('m月d日 H:i',$row['intime']+8*3600);
		$text=$row['text'];
//		$imagesrc=$row['imagesrc'];
		$releaserow=array(
			"name"=>"$name",
			"userid"=>"$userid",
			"time"=>"$time",
			"text"=>"$text",
//			"imagesrc"=>"$imagesrc",
			$imagesrc[]=explode(",", $row['imagesrc'])
		);
		$rows[]=$releaserow;
	}
	echo json_encode($rows);
?>