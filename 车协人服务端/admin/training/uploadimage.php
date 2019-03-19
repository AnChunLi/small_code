<?php
	include("../../config.php");
	$src=$_FILES['image']['tmp_name'];
	$file=$_FILES['image']['name'];
	$filefooter=explode('.', $file);
	$ext=array_pop($filefooter);
	$rand=time().mt_rand().'.'.$ext;
	$dst="../../upload/activity/{$rand}";
	if($_FILES['image']['error']===0)
	{
		if(move_uploaded_file($src, $dst))
		{
			
			
		echo "<script>imgid=parent.document.getElementById('upload');imgid.src='$dst';</script>";
			
		}
		
	}
?>
