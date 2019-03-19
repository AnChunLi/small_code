<?php
	include("../../public/common/config.php");
	include("../public/top.php");
	if(!isset($_SESSION['id']))
	{
		echo "<script>parent.location.href='../login/Login.html'</script>";
		exit;
	}
	$userid=$_SESSION['id'];
	$sql="select * from user where id='$userid'";
	$row=$db->query($sql)->fetch_array();
	$sqlreceive="select * from receive where userid='$userid'";
	$result=$db->query($sqlreceive);
	$receiverows=[];
	while($receiverow=$result->fetch_array())
	{
		$receiverows[]=$receiverow;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心</title>
		<!--bootstrap-->
		<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
	    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <!--引入图标-->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
		<!--自定义样式-->
		<link rel="stylesheet" href="my.css" />
		<!--表单验证插件-->
		<script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
		
		<style>
			.receive .td
			{
				font-size: 6px;
			}
		</style>
	</head>
	<body>	
		<ol class="breadcrumb">
		  <li><a href="../../index.php">首页</a></li>
		  <li class="active">个人中心</li>
		</ol>
		<div class="box">
			<h3>基本资料</h3>
			<div class="ziliao">
				<div class="item head">
					<div class="information"data-toggle="tooltip"title="点击上传头像">
						<!--<?php if(!isset($row['head'])):?>-->
						<img   src="<?php echo $row['headsrc'];?>" data-toggle="modal" data-target="#myuploadModal">
								
						<!--<?php else: ?>
							<img src="gethead.php" />
						<?php endif;?>-->
					</div>
				</div><div class="item name">
					<div class="information">
						<?php if(!isset($row['name'])):?>
							未设置
						<?php else: ?>
							<?php echo $row['name'];?>
						<?php endif;?>	
					</div>
				</div>
				<div class="item gender">
					<div class="information">
						<?php if($row['gender']==1):?>
						<i class="fa fa-venus" aria-hidden="true"style="color: orangered;"></i>
						<?php elseif($row['gender']==2):?>
						<i class="fa fa-mars" aria-hidden="true"style="color: #0000FF;"></i>
						<?php else:?>	
						未填写
						<?php endif;?>
					</div>
				</div>
				<table class="item smallbox">
					<tr class="minbox minbox1">
						<td class="item">
							<h3>年龄</h3>
							<div class="information">
								<?php if(!isset($row['age'])):?>
									未填写
								<?php else: ?>
									<?php echo $row['age'];?>
								<?php endif;?>	
							</div>
						</td>
						<td class="item">
							<h3>地区</h3>
							<div class="information">
								<?php if(!isset($row['address'])):?>
									未填写
								<?php else: ?>
									<?php echo $row['address'];?>
								<?php endif;?>	
							</div>
						</td>
					</tr>
					<tr class="minbox">
						<td class="item">
							<h3>电话</h3>
							<div class="information"><?php echo $row['tel'];?></div>
						</td>
						<td class="item">
							<h3>邮箱</h3>
							<div class="information">
								<?php if(!isset($row['email'])):?>
									未绑定
								<?php else: ?>
									<?php echo $row['email'];?>
								<?php endif;?>	
							</div>
						</td>
					</tr>
				</table>
			</div>
			<?php if(isset($row['head'])&&isset($row['name'])&&isset($row['gender'])&&isset($row['age'])&&isset($row['address'])&&isset($row['email'])):?>
			<button class="btn btn-primary complete">修改资料</button>
			<?php else:?>
			<button class="btn btn-danger complete"data-toggle="modal" data-target="#myModal">完善资料</button>
			<?php endif;?>
			<hr />
			<h3>收货地址</h3>
			<div class="addreceive"style="float: right;margin: 0 10% 5% 0;padding: 0;">
				<a title="添加收货地址"data-toggle="modal" data-target="#addreceiveModal">
					<i class="fa fa-plus-square" aria-hidden="true"style="color: orangered;font-size: 30px;"></i>
				</a>
			</div>
			<div class="receive">
				<table class="table">
					<thead>
						<tr>
							<th>姓名</th>
							<th>电话</th>
							<th>地址</th>
							<th>删除</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($receiverows as $receiverow){?>
						<tr>
							<td class="td"><?php echo $receiverow['name'];?></td>
							<td class="td"><?php echo $receiverow['tel'];?></td>
							<td class="address"style="font-size: 2px;"><?php echo $receiverow['address'];?></td>
							<td class="td"><a href="deletereceive.php?id=<?php echo $receiverow['id'];?>"><i class="fa fa-minus-circle" aria-hidden="true"style="color: orangered;"></i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- 模态框（Modal）完善 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">
							完善资料
						</h4>
					</div>
					<form  method="post" action="complete.php"id="defaultForm">
						<div class="modal-body">
                            <div class="form-group">
                                <label for="name">昵称</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="昵称">
                            </div>
                            <div class="form-group">
                                <label>性别</label>
                                <br>
                                <label for="gender1">
                                    <input type="radio" name="gender" id="gender1" value="1"> 女
                                </label>
                                <label class="gender2" style="margin-left: 100px">
                                    <input type="radio" name="gender" id="gender2" value="2"> 男
                                </label>
                            </div>
                             <div class="form-group">
                                <label for="age">年龄</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="年龄">
                            </div>
                             <div class="form-group">
                                <label for="email">地区</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="地区">
                            </div>
                            <div class="form-group">
                                <label for="email">邮箱</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="邮箱">
                            </div>
                        
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭
						</button>
						<button type="submit" class="btn btn-primary">
							确认提交
						</button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal -->
		</div>
		
		<!--上传图片模态框-->
		<div class="modal fade" id="myuploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">修改头像</h4>
		            </div>
		            <form action="uploadhead.php"method="post"enctype="multipart/form-data"id="formupload"target="mywin">
		            <div class="modal-body">
		            	 选择要上传的文件
		            	<input type="file" id="inputImage"name="head"required="required">
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		                <button type="button" class="btn btn-primary"id="up-btn-ok">上传</button>
		            </div>
		            </form>
		            <img src="" id="loading"/>
		            <!--隐藏上传窗口，实现页面无刷新上传-->
					<iframe name="mywin"frameborder="1"class="frame"style="display: none;">
					</iframe>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>			

		<!--添加收货地址模态框-->	
		<div class="modal fade" id="addreceiveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		    	<form action="addreceive.php"method="post"id="addreceiveform">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title" id="myModalLabel">添加收货地址</h4>
			            </div>
			            <div class="modal-body">
			            	<div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control"  name="name" placeholder="收货人姓名">
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <input type="text" class="form-control"  name="address" placeholder="收货地址">
                            </div>
                            <div class="form-group">
                                <label for="tel">电话</label>
                                <input type="text" class="form-control"  name="tel" placeholder="联系方式">
                            </div>
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			                <button type="submit" class="btn btn-primary">确定</button>
			            </div>
			        </div><!-- /.modal-content -->
		        </form>
		    </div><!-- /.modal -->
		</div>
		
		<?php include("../public/foot.php");?>
		<script>
			$('#up-btn-ok').click(function(){
				var upload=$('#inputImage').val();
				if(upload!='')
				{
					$('#formupload').submit();
				}
				else
				{
					alert('请选择头像文件！');
				}
			});
//			提示框
			$(function () { $("[data-toggle='tooltip']").tooltip(); });

	        // 验证完善资料表单的规则
	        $('#defaultForm').bootstrapValidator({
	            // live: 'enabled',
	            message: '输入的值无效',
	            feedbackIcons: {
	                valid: 'glyphicon glyphicon-ok',
	                invalid: 'glyphicon glyphicon-remove',
	                validating: 'glyphicon glyphicon-refresh'
	            },
	            fields: {
	
	                
	                email: {
	                    validators: {
	                        notEmpty: {
	                            message: "请输入您的邮箱"
	                        },
		                      regexp:{
		                      					regexp:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/,
					                    		message:'邮件地址格式不正确！'
					                    	}
		                    }
	                },
	                age: {
	                    validators: {
	                        notEmpty: {
	                            message: "请输入您的年龄！"
	                        },
		                      regexp:{
					                    		regexp:/^([0-9]\d{1,1})$/,
					                    		message:'请输入正确的年龄！'
					                    	}
		                    }
	                },
	                name: {
	                    validators: {
	                        notEmpty: {
	                            message: "请输入您的昵称！"
	                        }
		                }
	                },
	                
	                gender: {
	                    validators: {
	                        notEmpty: {
	                            message: '请选择一个性别'
	                        }
	                    }
	                },
	                address: {
	                    validators: {
	                        notEmpty: {
	                            message: "请输入您的地址"
	                        }
	                    }
	                }
	            }
        	});
        	
        	
//      	验证添加收货地址表单
			 $('#addreceiveform').bootstrapValidator({
	            // live: 'enabled',
	            message: '输入的值无效',
	            feedbackIcons: {
	                valid: 'glyphicon glyphicon-ok',
	                invalid: 'glyphicon glyphicon-remove',
	                validating: 'glyphicon glyphicon-refresh'
	            },
	            fields: {
	
	                
	                
	                name: {
	                    validators: {
	                        notEmpty: {
	                            message: "请输入收货人的真实姓名！"
	                        }
		                }
	                },
	                address: {
	                    validators: {
	                        notEmpty: {
	                            message: "请输入正确的收货人地址！"
	                        }
	                    }
	                },
	                tel: {
                    validators: {
                        notEmpty: {
                            message: "请输入手机号码"
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: "请输入11位手机号码"
                        },
                        regexp: {
                            regexp: /^1[3|5|8]{1}[0-9]{9}$/,
                            message: "请输入有效的手机号码"
                        }
                    }
                	},
	            }
        	});
		</script>
			
	</body>
</html> 
