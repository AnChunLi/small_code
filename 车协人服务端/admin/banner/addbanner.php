<?php
	include("../../config.php");
	$imagesrc=$_POST['imagesrc'];
	$src=$_POST['text'];
	if($imagesrc=='../public/img/addimage.jpg')
	{
		echo "<script>alert('请上传图片！');</script>";
	}
	else
	{
		$sql1="insert into banner (src,imageurl) values ('$src','$imagesrc')";
		$is1=$db->query($sql1);
		if($is1)
		{
			echo 1;
		}
	}
?>