<?php
	include("../../public/common/config.php");
	session_start();
	if(isset($_SESSION['id']))
	{
			$userid=$_SESSION['id'];
			$id=$_POST['releaseid'];
		//	查询是否已点赞
			$sqllike="select * from likerecord where releaseid='$id' and userid='$userid'";
			$likerow=$db->query($sqllike)->fetch_array();
			if(!isset($likerow))
			{
				$sqlupdate="update releases set likenum=likenum+1 where id='$id'";
				$db->query($sqlupdate);
		//		保存点赞记录
				$sqlrecord="insert into likerecord (releaseid, userid) values ('$id','$userid')";
				$db->query($sqlrecord);
				$sqllikenum="select * from releases where id='$id'";
				$likenum=$db->query($sqllikenum)->fetch_array();
				if($likenum['likenum']!=0)
				{
					echo $likenum['likenum'];
				}
			}
			else
			{
				echo "已赞";
			}
	}
	else
	{
		$id=$_POST['releaseid'];
		$sqlupdate="update releases set likenum=likenum+1 where id='$id'";
		$db->query($sqlupdate);
		$sqllikenum="select * from releases where id='$id'";
		$likenum=$db->query($sqllikenum)->fetch_array();
		if($likenum['likenum']!=0)
		{
			echo $likenum['likenum'];
		}
	}
?>