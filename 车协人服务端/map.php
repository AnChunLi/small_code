<?php
 	include("config.php");
	$sql="select * from map order by id";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$name=$row['name'];
		$id=$row['id'];
		$r=array(
			"id"=>"$id",
			"iconPath"=>"../../image/poi.png",
            "latitude"=>"$latitude",
            "longitude"=>"$longitude",
            "width"=>35,
            "height"=>35,
			"callout"=>array(
							"content"=>"$name",
							"fontSize"=>16,
							"color"=>"#ffffff",
							"bgColor"=>"#1296db",
							"display"=>"ALWAYS",
							"textAlign"=> "center",
							"padding"=>5,
							"borderRadius"=>5
					),
		);
		$rows[]=$r;
	}
	echo json_encode($rows);
?>