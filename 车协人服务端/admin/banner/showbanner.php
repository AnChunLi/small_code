<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM banner ORDER BY id";
	$max="SELECT MAX(id) FROM banner";
	$maxid=$db->query($max)->fetch_array();
	$result1=$db->query($sql1);
	$banners=[];
	while($banner=$result1->fetch_array())
	{
		$banners[]=$banner;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
			<!--bootstrap-->
		<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <!--表单验证插件-->
		<script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
		<style>
			button
			{
				margin: 15px;
			}
			body
			{
				padding: 0 10%;
			}
			.input img
			{
				width: 80px;
				height: 80px;
			}
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"data-toggle="modal" data-target="#releasesModal"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 添加
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="200">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>排序</th>
				<th>图片</th>
				<th>链接</th>
				<th>状态</th>
				<th>处理</th>
				<th>调序</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($banners as $banner){
			?>
			<tr>
				<td><?php echo $banner['id'];?></td>
				<td><img src="<?php echo $banner['imageurl'];?>"/></td>
				<td><?php echo $banner['src'];?></td>
				<td>
					<?php if($banner['state']==1):?>
						正在使用
					<?php else:?>
						已禁用
					<?php endif;?>
				</td>
				<td>
					<?php if($banner['state']==1):?>
						<button class="layui-btn layui-btn-primary layui-btn-sm"onclick="location='ban.php?id=<?php echo $banner['id'];?>'">
						  禁用
						</button>
					<?php else:?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='start.php?id=<?php echo $banner['id'];?>'">
						  启用
						</button>
					<?php endif;?>
				</td>
				<td>
					<?php if($banner['id']==1):?>
							<a href="downsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon">&#xe61a;</i></a>
					<?php elseif($banner['id']==$maxid[0]):?>
							<a href="upsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon"style="color:#1E9FFF ;">&#xe619;</i></a>
					<?php else:?>
							<a href="upsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon"style="color:#1E9FFF ;">&#xe619;</i></a>&nbsp;&nbsp;
							<a href="downsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon">&#xe61a;</i></a>
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deletebanner.php?id=<?php echo $banner['id'];?>'">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		
		
		
		<!--添加banner模态框-->
		<div class="modal fade" id="releasesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title" id="myModalLabel"style="color: orangered;">添加</h4>
			            </div>
			            <div class="modal-body">
			            	<form action=""method="post"id="addreleasesform">
			            		<div class="form-group">
			            			<input  name="text"placeholder="输入跳转页面路径，如没有请填0"class="form-control"id="text"></input>
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
			                <button type="button" class="btn btn-danger"id="fabu">提交</button>
			            </div>
			        </div><!-- /.modal-content -->
		        <!--实现无页面刷新上传图片-->
		        <iframe name="uploadwin"style="display: none;"></iframe>
		    </div><!-- /.modal -->
		</div>

		
		<!--layui.js引入-->
		<script src="../public/layui/layui.all.js"></script>
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
						url:"addbanner.php",
						data:{
							text,
							imagesrc,
						},
						dataType:"json",
						success:function(data){
							if(data==1)
							{
								location.href='showbanner.php';
							}
						}
					});
//					console.log(text);
					console.log(imagesrc);
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
		                            message: "请输入内容！"
		                        }
		                }
		             
		            }
		           },
	        	});
	    </script>

	</body>
</html>