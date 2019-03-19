<?php
	include("../../public/common/config.php");
	session_start();
	$userid=$_SESSION['id'];
	$src=$_FILES['head']['tmp_name'];
	$file=$_FILES['head']['name'];
	$filefooter=explode('.', $file);
	$ext=array_pop($filefooter);
	$rand=time().mt_rand().'.'.$ext;
	$dst="../../upload/head/{$rand}";
	if($_FILES['head']['error']===0)
	{
		if(move_uploaded_file($src, $dst))
		{
			$sql="update user set headsrc='$dst' where id='$userid'";
			$is=$db->query($sql);
			if($is)
			{
				echo "<script>loading=top.document.getElementById('loading');loading.src='../public/img/loading.gif';</script>";
				echo "
				<script>
					parent.location.href='my.php';
				</script>
				";
			}
		}
		
	}
?>
