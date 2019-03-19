<?php
	include("../../public/common/config.php");
	include("../public/top.php");
	$sql="select * from releases order by id desc";
	$result=$db->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>社区</title>
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
			.body1
			{
				width: 60%;
				margin: 1% 20%;
				border-radius: 10px;
				background-color: #fff;
				box-shadow: 10px 10px 3px #888888;
				border: solid #888 3px;
			}
			.modal
			{
				margin-top: 10%;
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
			.add
			{
				margin: 10px auto 0 75%;
				color: orangered;
				font-size: 30px;
			}
			.input img
			{
				width: 80px;
				height: 80px;
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
			.like1, .like1:hover ,.like1:after
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
			.commentnum
			{
				color: #888;
				font-size: 15px;
			}
			.everyrelease, .everyrelease:hover, .everyrelease:visited, .everyrelease:active
			{
				color: #000;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="../../index.php">首页</a></li>
		  <li class="active">社区</li>
		</ol>
		<?php if(isset($_SESSION['id'])):?>
		<i class="fa fa-plus add" aria-hidden="true"data-toggle="modal" data-target="#releasesModal"></i>
		<?php else:?>
		<i class="fa fa-plus add" aria-hidden="true"data-toggle="modal" data-target="#pleaseloginModal"></i>
		<?php endif;?>
		<div class="body1">
			<?php 
				while($row=$result->fetch_array())
				{
					$userid=$row['userid'];
					$sqluser="select * from user where id='$userid'";
					$userrow=$db->query($sqluser)->fetch_array();
					$releaseid=$row['id'];
					$sqlcomment="select * from comment where release_id='$releaseid'";
					$commentresult=$db->query($sqlcomment);
					$commentnum=0;
					while($commentrow=$commentresult->fetch_array())
					{
						$commentnum++;
					}
			?>
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
				<a class="everyrelease" href="everyrelease.php?releaseid=<?php echo $row['id'];?>">
					<div class="text"><?php echo $row['text'];?></div>
				</a>
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
						<a class="everyrelease" href="everyrelease.php?releaseid=<?php echo $row['id'];?>">
							<i class="far fa-comment-dots"></i>
						</a>
						<?php if($commentnum!=0):?>
						<font class="commentnum"><?php echo $commentnum;?></font>
						<?php endif;?>
						<i class="fa fa-share" aria-hidden="true"></i>
					</div>
					<div class="comment"></div>
				</div>
			</div>
			<?php } ?>
		</div>
		
		<!--发布动态模态框-->
		<div class="modal fade" id="releasesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title" id="myModalLabel"style="color: orangered;">发布</h4>
			            </div>
			            <div class="modal-body">
			            	<form action=""method="post"id="addreleasesform">
			            		<div class="form-group">
			            			<textarea  name="text"placeholder="输入动态内容"class="form-control"id="text"></textarea>
			            		</div>
			            	</form>
			            	<div class="input">
			            		<h5>选择图片</h5>
			            		<form id="uploadimageform"action="uploadimage.php"method="post"enctype="multipart/form-data"target="uploadwin">
				            		<img id="uploadimage" src="../public/img/addimage.jpg"/>
				            		<input id="selectimage"type="file"name="image"style="display: none;" >
			            		</form>
			            	</div>
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			                <button type="button" class="btn btn-danger"id="fabu">发布</button>
			            </div>
			        </div><!-- /.modal-content -->
		        <!--实现无页面刷新上传图片-->
		        <iframe name="uploadwin"style="display: none;"></iframe>
		    </div><!-- /.modal -->
		</div>
		
		<!--如果未登录，请先登录！ 模态框-->
		<div class="modal fade" id="pleaseloginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">你还未登录，请先登录！</h4>
		            </div>
		            <!--<div class="modal-body">在这里添加一些文本</div>-->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">先不了</button>
		                <button type="button" class="btn btn-danger"onclick="location='../login/Login.html'">去登录</button>
		            </div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>
	
	
	
		<?php include("../public/foot.php");?>
		<script>
			$('#uploadimage').click(function(){
				$('#selectimage').click();
			});
			$('#selectimage').change(function(){
				$('#uploadimageform').submit();
			});
			$('#fabu').click(function(){
			    $("#addreleasesform").bootstrapValidator('validate');
			     if ($("#addreleasesform").data('bootstrapValidator').isValid())
			     {
//			     	使用ajax提交表单
					var text=$('#text').val();
					var imagesrc=$('#uploadimage').attr("src");
					$.ajax({
						type:"post",
						url:"addreleases.php",
						data:{
							text,
							imagesrc,
						},
						dataType:"json",
						success:function(data){
							if(data==1)
							{
								location.href='community.php';
							}
						}
					});
//					console.log(text);
//					console.log(imagesrc);
			     } 
			});
						// 验证完善资料表单的规则
		        $('#addreleasesform').bootstrapValidator({
		            message: '输入的值无效',
		            feedbackIcons: {
		                valid: 'glyphicon glyphicon-ok',
		                invalid: 'glyphicon glyphicon-remove',
		                validating: 'glyphicon glyphicon-refresh'
		            },
		            fields: {
		                
		                text: {
		                    validators: {
		                        notEmpty: {
		                            message: "请输入发布内容！"
		                        }
		                }
		             
		            }
		           },
	        	});
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
