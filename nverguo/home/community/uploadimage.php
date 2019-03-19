<?php
	include("../../public/common/config.php");
	$src=$_FILES['image']['tmp_name'];
	$file=$_FILES['image']['name'];
	$filefooter=explode('.', $file);
	$ext=array_pop($filefooter);
	$rand=time().mt_rand().'.'.$ext;
	$dst="../../upload/community/{$rand}";
	if($_FILES['image']['error']===0)
	{
		if(move_uploaded_file($src, $dst))
		{
			$sql="insert into communityimage (imagesrc) values ('$dst')";
			$is=$db->query($sql);
			if($is)
			{
				echo "<script>imgid=top.document.getElementById('uploadimage');imgid.src='$dst';</script>";
			}
		}
		
	}
?>
