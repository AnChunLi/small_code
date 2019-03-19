<?php
	include("config.php");
	$name=$_POST['name'];
	$studentnumber=$_POST['studentnumber'];
	$school=$_POST['school'];
	$grade=$_POST['grade'];
	$gender=$_POST['gender'];
	$tel=$_POST['tel'];
	$qq=$_POST['qq'];
	$sushe=$_POST['sushe'];
	$password=md5($_POST['password']);
	$imagesrc=$_POST['imagesrc'];
	$sql="insert into user (name,studentnumber,school,grade,gender,tel,qq,sushe,password,schoolcard) values ('$name','$studentnumber','$school','$grade','$gender','$tel','$qq','$sushe','$password','$imagesrc')";
	$is=$db->query($sql);
?>