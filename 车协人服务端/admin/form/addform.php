<?php
	include("../public/safe.php");
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
		<button class="layui-btn layui-btn-sm"data-toggle="modal" data-target="#type1">
		  <i class="layui-icon">&#xe608;</i> 添加填空
		</button>
		<button class="layui-btn layui-btn-sm"data-toggle="modal" data-target="#type2">
		  <i class="layui-icon">&#xe608;</i> 添加单选
		</button>
		<button class="layui-btn layui-btn-sm"data-toggle="modal" data-target="#type3">
		  <i class="layui-icon">&#xe608;</i> 添加多选
		</button>
		<button class="layui-btn layui-btn-sm"data-toggle="modal" data-target="#type4">
		  <i class="layui-icon">&#xe608;</i> 添加图片上传
		</button>
		
		<div id="testform"class="layui-form"></div>
		
				<!--添加填空模态框-->
		<div class="modal fade" id="type1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
			        <div class="modal-content">
			        	<form action=""method="post"id="addreleasesform">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                <h4 class="modal-title" id="myModalLabel">添加填空题</h4>
				            </div>
				            <div class="modal-body">
				            	
				            		<div class="form-group">
				            			问题<input  name="answer"placeholder="填写问题"class="form-control"id="answer1"></input>
				            			提示<input  name="placeholder"placeholder="填写提示"class="form-control"id="placeholder1"></input>
				            		</div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				                <button type="button" class="btn btn-danger"id="addtype1">添加</button>
				            </div>
			            </form>
			        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>
		
		<!--添加单选模态框-->
		<div class="modal fade" id="type2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
			        <div class="modal-content">
			        	<form action=""method="post"id="addreleasesform">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                <h4 class="modal-title" id="myModalLabel">添加单选题</h4>
				            </div>
				            <form class="layui-form" action="">
				            	<div class="modal-body">
				            </form>
				            		<div class="form-group">
				            			<input  name="answer"placeholder="填写问题"class="form-control"id="answer2"></input>
				            		</div>
				            	<div class="input">
				            		<h5>添加选项</h5>
				            			<ul id="list"></ul>
					            		<input id="selectoption"type="text"name="selectoption"><i class="layui-icon"style="color: #000000;font-size: 25px;"onclick="addoption()">&#xe608;</i>
					            		<i class="layui-icon"style="color: #000000;font-size: 25px;"onclick="deleteoption()">&#xe640;</i>
				            	</div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				                <button type="button" class="btn btn-danger"id="addtype2">添加</button>
				            </div>
			            </form>
			        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>
		
		
		<!--添加多选模态框-->
		<div class="modal fade" id="type3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
			        <div class="modal-content">
			        	<form action=""method="post"id="addreleasesform">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                <h4 class="modal-title" id="myModalLabel">添加多选题</h4>
				            </div>
				            <form class="layui-form" action="">
				            	<div class="modal-body">
				            </form>
				            		<div class="form-group">
				            			<input  name="answer"placeholder="填写问题"class="form-control"id="answer3"></input>
				            		</div>
				            	<div class="input">
				            		<h5>添加选项</h5>
				            			<ul id="lists"></ul>
					            		<input id="selectoptions"type="text"name="selectoption"><i class="layui-icon"style="color: #000000;font-size: 25px;"onclick="addoptions()">&#xe608;</i>
					            		<i class="layui-icon"style="color: #000000;font-size: 25px;"onclick="deleteoptions()">&#xe640;</i>
				            	</div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				                <button type="button" class="btn btn-danger"id="addtype3">添加</button>
				            </div>
			            </form>
			        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>
		
		<!--添加图片上传模态框-->
		<div class="modal fade" id="type4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
			        <div class="modal-content">
			        	<form action=""method="post"id="addreleasesform">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                <h4 class="modal-title" id="myModalLabel">添加图片题</h4>
				            </div>
				            <div class="modal-body">
				            	
				            		<div class="form-group">
				            			问题<input  name="answer"placeholder="填写问题"class="form-control"id="answer4"></input>
				            		</div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				                <button type="button" class="btn btn-danger"id="addtype4">添加</button>
				            </div>
			            </form>
			        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>
		
		<!--layui.js引入-->
		<script src="../public/layui/layui.all.js"></script>
		<script>
//			添加填空

			$('#addtype1').click(function(){
				var answer=$('#answer1').val();
				var placeholder=$('#placeholder1').val();
				$('#testform').append(
					"<div class='layui-form-item'>"+
					    "<label class='layui-form-label'></label>"+
					    answer+
					    "<div class='layui-input-block'>"+
					      "<input type='text'  required  lay-verify='required' placeholder='"+placeholder+"' autocomplete='off' class='layui-input'>"+
					    "</div>"+
					"</div>"
				);
				$('#type1').modal('hide');
				$('#answer1').val('');
				$('#placeholder1').val('');
			});
		
			var arrar=[];
			var arrars=[];
//			选项添加和删除
			var addoption=function(){
				var list="";
				var selectoption=$('#selectoption').val();
				if(selectoption=='')
				{
					$('#list').html("<p style='color:red;'>"+"请输入选项内容！"+"</p>");
				}
				else
				{
					arrar.push(selectoption);
					for(var i=0;i<arrar.length;i++)
					{
						list+="<li>"+arrar[i]+"</li>";
					}
					$('#list').html(list);
					$('#selectoption').val('');
				}
			}
//			多选
			var addoptions=function(){
				var list="";
				var selectoption=$('#selectoptions').val();
				if(selectoption=='')
				{
					$('#lists').html("<p style='color:red;'>"+"请输入选项内容！"+"</p>");
				}
				else
				{
					arrars.push(selectoption);
					for(var i=0;i<arrars.length;i++)
					{
						list+="<li>"+arrars[i]+"</li>";
					}
					$('#lists').html(list);
					$('#selectoptions').val('');
				}
			}
			var deleteoption=function()
			{
				arrar=[];
				$('#list').html('');
			}
			var deleteoptions=function()
			{
				arrars=[];
				$('#lists').html('');
			}
//			添加单选
			$('#addtype2').click(function(){
				var answer=$('#answer2').val();
				$('#testform').append(
					"<div class='layui-form-item'>"+
					"<label class='layui-form-label'></label>"+
					    answer+
					    "<div class='layui-input-block'>"+
					    	"<input type='radio' value='1'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrar[0]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrar[1]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrar[2]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrar[3]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrar[4]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrar[5]+"</div>"+
								"</div>"+
					    "</div>"+
					"</div>"
				);
				$('#type2').modal('hide');
				$('#answer2').val('');
				$('#list').html('');
			});
//			添加多选
			$('#addtype3').click(function(){
				var answer=$('#answer3').val();
				$('#testform').append(
					"<div class='layui-form-item'>"+
					"<label class='layui-form-label'></label>"+
					    answer+
					    "<div class='layui-input-block'>"+
					    	"<input type='radio' value='1'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrars[0]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrars[1]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrars[2]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrars[3]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrars[4]+"</div>"+
								"</div>"+
							"<input type='radio' value='2'>"+
								"<div class='layui-unselect layui-form-radio'>"+
								"<i class='layui-anim layui-icon'>&#xe63f;</i>"+
								"<div>"+arrars[5]+"</div>"+
								"</div>"+
					    "</div>"+
					"</div>"
				);
				$('#type3').modal('hide');
				$('#answer3').val('');
				$('#lists').html('');
			});
//			添加图片题
			$('#addtype4').click(function(){
				var answer=$('#answer4').val();
				$('#testform').append(
					"<div class='layui-form-item'>"+
					    "<label class='layui-form-label'></label>"+
					    answer+
					    "<div class='layui-input-block'>"+
					      "<input type='file'  required  lay-verify='required'  autocomplete='off' >"+
					    "</div>"+
					"</div>"
				);
				$('#type4').modal('hide');
				$('#answer4').val('');
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
	    </script>

	</body>
</html>