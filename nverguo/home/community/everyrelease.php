<?php
	include("../../public/common/config.php");
	include("../public/top.php");
	$id=$_GET['releaseid'];
	$sql="select * from releases where id='$id'";
	$row=$db->query($sql)->fetch_array();
	$releaseuserid=$row['userid'];
	$sqluser="select * from user where id='$releaseuserid'";
	$userrow=$db->query($sqluser)->fetch_array();
	$releaseid=$row['id'];
	$sqlcomment="select * from comment where release_id='$id'";
	$commentresult=$db->query($sqlcomment);
	$commentnum=0;
	while($commentrow=$commentresult->fetch_array())
	{
		$commentnum++;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<!--bootstrap-->
		<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <!--表单验证插件-->
		<script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
		<!--引入图标-->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style>
			body
			{
				margin-top: 51px;
				background-color: #eee;
			}
			.bodyrelease
			{
				width: 60%;
				margin: 1% 20%;
				border-radius: 10px;
				background-color: #fff;
				box-shadow: 5px 5px 3px #888888;
				border: solid #888 3px;
			}
			.releases
			{
				
				margin: 20px 8%;
				padding: 20px 0;
			}
			.image img
			{
				width: 120px;
				height: 120px;
				border-radius: 10px;
				margin: 10px 5%;
			}
			.user
			{
				display: inline-block;
				margin: 20px 0 15px 0;
			}
			.username
			{
				display: inline-flex;
			}
			.name
			{
				color: orangered;
				font-size: 18px;
				margin-left: 5px;
			}
			.time
			{
				color: #888;
				font-size: 10px;
				margin-top: 5px;
			}
			.text
			{
				margin: 5px 5%;
			}
			.foot .like
			{
				float: right;
				font-size: 20px;
				margin-bottom: 20px;
			}
			.foot .like i
			{
				margin: 0 3px;
			}
			.like1, .like1:hover 
			{
				color: #000;
				text-decoration: none;
			}
			.like1:visited
			{
				color: #000;
				text-decoration: none;
			}
			.like1 i font
			{
				color: #888;
				font-size: 15px;
			}
			.bodycomment
			{
				width: 60%;
				margin: 10px 20%;
			}
			.comments
			{
				margin: 10px 0;
			}
			.comment
			{
				margin: 10px 0;
				background-color: #fff;
				padding: 5px 5%;
				border: solid 1px #A9A9A9;
				border-radius: 5px;
			}
			.comment .commentuser
			{
				display: inline-flex;
			}
			.comment .commentuser .userhead img
			{
				width: 30px;
				height:30px;
				margin-right: 5px;
			}
			.comment .commentuser .username
			{
				font-size: 15px;
				color: orangered;
			}
			.comment .commentuser .commenttime
			{
				font-size: 10px;
				color: #888888;
			}
			.comment .commenttext
			{
				margin: 10px 5%;
			}
			.commentnum
			{
				color: #888;
				font-size: 15px;
			}
		</style>
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="../../index.php">首页</a></li>
		  <li><a href="community.php">社区</a></li>
		  <li class="active">动态详情</li>
		</ol>
		<!--动态部分-->
		<div class="bodyrelease">
			<div class="releases">
					<div class="user">
						<div class="username">
							<div class="head">
								<img src="<?php echo $userrow['headsrc'];?>" style="width: 30px;height: 30px;"class="img-circle"/>
							</div>
							<div class="name"><strong><?php echo $userrow['name'];?></strong></div>
						</div>
						<div class="time"><?php echo date("Y-m-d H:i",$row['intime']+8*3600);?></div>
					</div>
					<div class="text"><?php echo $row['text'];?></div>
					<?php if($row['imagesrc']):?>
						<div class="image">
							<img src="<?php echo $row['imagesrc'];?>" />
						</div>
					<?php endif;?>
					<div class="foot">
						<div class="like">
							<!--点赞-->
							<a href="javascript:void(0);"class="like1">
								<?php if(isset($_SESSION['id'])):?>
									<?php 
										$usermyid=$_SESSION['id'];
										//	查询是否已点赞
										$id=$row['id'];
										$sqllike="select * from likerecord where releaseid='$id' and userid='$usermyid'";
										$likerow=$db->query($sqllike)->fetch_array();
										if($likerow):
									?>
									<i class="far fa-thumbs-up"rel="<?php echo $row['id'];?>"style="color: orangered;">
									<?php else:?>
									<i class="far fa-thumbs-up"rel="<?php echo $row['id'];?>">
									<?php endif;?>
								<?php else:?>
									<i class="far fa-thumbs-up"rel="<?php echo $row['id'];?>">
								<?php endif;?>
									<font >
										<?php if($row['likenum']!=0):?>
										<?php echo $row['likenum'];?>	
										<?php endif;?>
									</font>
								</i>
							</a>
							<i class="far fa-comment-dots"></i>
							<?php if($commentnum!=0):?>
							<font class="commentnum"><?php echo $commentnum;?></font>
							<?php endif;?>
							<i class="fa fa-share" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
			
			
			
			<div class="bodycomment">
				<!--发表评论-->
				<form action="addcomment.php?id=<?php echo $id;?>"class="form-inline"method="post">
						<input class="form-control"placeholder="评论内容…" name="comment"type="text"style="width:92%;"required="required"/>
						<button type="submit"class="btn btn-danger">评论</button>
				</form>
			
			
				<!--评论区-->
				<div class="comments">
					<div style="color: #888;">评论：</div>
					<?php
						$sqlcomment="select * from comment where release_id='$id' order by id desc";
						$result=$db->query($sqlcomment);
						while($commentrow=$result->fetch_array())
						{
							$userid=$commentrow['userid'];
							$sqlcommentuser="select * from user where id='$userid'";
							$commentuserrow=$db->query($sqlcommentuser)->fetch_array();
					?>
					<div class="comment">
						<div class="commentuser">
							<div class="userhead">
								<img src="<?php echo $commentuserrow['headsrc'];?>" class="img-circle"/>	
							</div>
							<div>
								<div class="username"><?php echo $commentuserrow['name'];?></div>
								<div class="commenttime"><?php echo date("Y/m/d H:i",$commentrow['intime']+8*3600);?></div>
							</div>
						</div>
						<div class="commenttext"><?php echo $commentrow['text'];?></div>
					</div>
					<?php } ?>
				</div>
			</div>
			
		<?php include("../public/foot.php");?>	
		<script>
			//		        	点赞功能
			$('.like1 i').click(function(){
				var like=$(this);
				var releaseid=like.attr('rel'); 
				$.ajax({
					type:"post",
					url:"like.php",
					cache:false,
					data:
					{
						releaseid
					},
					success:function(data){
						like.children('font').text(data);
						like.css("color","orangered");
					}
				});
			});
		</script>
	</body>
</html>
