<?php
	$image=$_FILES['image']['tmp_name'];
	$filename=$_FILES['image']['name'];
	$filenamepart=explode('.', $filename);
	$ext=array_pop($filenamepart);
	$rand=time().mt_rand().'.'.$ext;
	$uploadpath="../../schoolcard/{$rand}";
	if($_FILES['image']['error']===0)
	{
		if(move_uploaded_file($image, $uploadpath))
		{
			
				echo "<script>imgid=parent.document.getElementById('upload');imgid.src='$uploadpath';</script>";
			
		}
	}
?>