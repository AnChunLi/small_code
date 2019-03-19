<?php
	include("../config.php");
	$bycycleid=$_POST['bycycleid'];
	$userid=$_GET['id'];
	$during=$_POST['during'];
	$time=time()+8*3600;
	$sql="insert into zucheindent (userid,bycycleid,time,during) values ('$userid','$bycycleid','$time','$during')";
	$db->query($sql);
?>