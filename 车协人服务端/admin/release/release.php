<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="select * from releases order by id desc";
	$result=$db->query($sql);
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
			.input img
			{
				width: 80px;
				height: 80px;
			}
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"data-toggle="modal" data-target="#releasesModal"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 发布公告
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>动态</th>
				<th>时间</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
					while($row=$result->fetch_array())
					{
						$userid=$row['userid'];
						$usersql="select * from user where id='$userid'";
						$userrow=$db->query($usersql)->fetch_array();
			?>
			<tr>
				<td><?php echo $userrow['studentnumber'];?></td>
				<td><?php echo $userrow['name'];?></td>
				<td style="word-break:break-all;width: 200px;"><?php echo $row['text'];?></td>
				<td><?php echo date('Y-m-d H:i:s',$row['intime']+8*3600);?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="if(confirm('确实要删除该内容吗?')){location='deleterelease.php?id=<?php echo $row['id'];?>'}">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		
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
			            			<textarea  name="text"placeholder="输入公告内容"class="form-control"id="text"></textarea>
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
						url:"addreleases.php",
						data:{
							text,
							imagesrc,
						},
						dataType:"json",
						success:function(data){
							if(data==1)
							{
								location.href='release.php';
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
	    </script>
		

	</body>
</html>
