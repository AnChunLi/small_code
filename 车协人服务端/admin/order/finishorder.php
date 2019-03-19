<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$time=time();
	$sql="update indent set finish='1',finishtime='$time' where id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>alert('预约处理完成！');location.href='orderlist.php'</script>";
	}
?>