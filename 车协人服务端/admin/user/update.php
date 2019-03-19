<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$studentnumber=$_POST['studentnumber'];
	$name=$_POST['name'];
	$grade=$_POST['grade'];
	$school=$_POST['school'];
	$level=$_POST['level'];
	$imagesrc=$_POST['imagesrc'];
	$tel=$_POST['tel'];
	$qq=$_POST['qq'];
	$sushe=$_POST['sushe'];
	$sql="UPDATE user SET name='$name',studentnumber='$studentnumber',grade='$grade' ,school='$school' ,level='$level',schoolcard='$imagesrc',tel='$tel',qq='$qq',sushe='$sushe' WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='user.php';</script>";
	}
?>