<?php
	include("config.php");
	$img=$_FILES['file']['tmp_name'];
	$imgname=$_FILES['file']['name'];
	$namepart=explode('.', $imgname);
	$namefoot=array_pop($namepart);
	$rand=time().mt_rand().'.'.$namefoot;
	$path="schoolcard/{$rand}";
	if($_FILES['file']['error']===0)
	{
		if(move_uploaded_file($img, $path))
		{
			echo $path;
		}
		
	}
?>