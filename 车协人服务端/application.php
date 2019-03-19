<?php
	include("config.php");
	$sql="select * from banner where state='1' order by id desc";
	$result=$db->query($sql);
	$banner=[];
	while($row=$result->fetch_array())
	{
		$imageurl=substr($row['imageurl'], 6);
		$src=$row['src'];
		$show=1;
		$rows=array(
		"image"=>"$imageurl",
		"src"=>"$src",
		"show"=>"$show"
		);
		$banner[]=$rows;
	}
	echo json_encode($banner);
?>