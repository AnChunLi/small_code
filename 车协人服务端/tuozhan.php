<?php
	include("config.php");
	$userid=$_GET['id'];
	$biketype=$_POST['biketype'];
	$joinchedui=$_POST['joinchedui'];
	$cycle=$_POST['cycle'];
	$distance=$_POST['distance'];
	$joinguanli=$_POST['joinguanli'];
	$gat=$_POST['gat'];
	$time=time()+8*3600;
	$sql="insert into tuozhan (userid, biketype, joinchedui, cycle, distance, joinguanli, gat,time) values ('$userid','$biketype','$joinchedui','$cycle','$distance','$joinguanli','$gat','$time')";
	$db->query($sql);
?>