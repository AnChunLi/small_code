<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$name=$_POST['name'];
	$form_data_type = $_FILES['logo']['type'];
	$form_data = $_FILES['logo']['tmp_name'];
	$data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
	$sql="INSERT INTO brand (name, logo, logotype) VALUES ('$name', '$data','$form_data_type')";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>location.href='brand.php';</script>";
	}
?>