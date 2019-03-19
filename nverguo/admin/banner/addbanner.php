<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$text=$_POST['text'];
	$src=$_POST['address'];
	$form_data_type = $_FILES['banner']['type'];
	$form_data = $_FILES['banner']['tmp_name'];
	$data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
	$sql="INSERT INTO banner (text, img, imgtype, address) VALUES ('$text', '$data','$form_data_type','$src')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='showbanner.php';</script>";
	}
?>