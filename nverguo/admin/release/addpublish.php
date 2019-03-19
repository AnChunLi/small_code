<?php
//  require '../../public/qiniuyun/autoload.php';
//	use Qiniu\Auth;
//	use Qiniu\Storage\UploadManager;
	include("../../public/common/config.php");
	include("../public/safe.php");
	$text=$_POST['text'];
	$username="平台公告";
	$time=time();
//	$form_data_name = $_FILES['publish-image']['name'];
//	$form_data_size = $_FILES['publish-image']['size'];
	$form_data_type = $_FILES['publish-image']['type'];
	$form_data = $_FILES['publish-image']['tmp_name'];
	$data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
	$sql="INSERT INTO releases (username, text, intime,image,imagetype) VALUES ('$username', '$text', '$time','$data','$form_data_type')";
	$is=$db->query($sql);
//	if(isset($form_data))
//	{
//		
//		$result = $db->query("INSERT INTO image (bin_data,filename,filesize,filetype)
//                VALUES ('$data','$form_data_name','$form_data_size','$form_data_type')");
//		if($result&&$is)
//		{
//			echo "<script> alert('发布成功！');location.href='showrelease.php'; </script>";
//		}
//	}
//	else
//	{
		if($is)	
		{
			echo "<script> alert('发布成功！');location.href='showrelease.php'; </script>";
		}
//	}
?>

    
    
   
