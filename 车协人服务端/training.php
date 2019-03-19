<?php
	include("config.php");
	$sql="select * from training order by id desc";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
			$title=$row['title'];
			$starttime=substr($row['starttime'], 5,11);
			$time=strtotime($row['overtime']);
			$overtime=$time*1000;
			$place=$row['place'];
			$lat=$row['latitude'];
			$long=$row['longitude'];
			$image=$row['image'];
			$text=$row['text'];
			$id=$row['id'];
			$r=array(
				"title"=>"$title",
				"starttime"=>"$starttime",
				"overtime"=>"$overtime",
				"place"=>"$place",
				"lat"=>"$lat",
				"long"=>"$long",
				"image"=>"$image",
				"text"=>"$text",
				"id"=>"$id"
			);
			$rows[]=$r;
	}
		echo json_encode($rows);
?>