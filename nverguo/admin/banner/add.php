<?php
	include("../public/safe.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
		<link rel="stylesheet" href="../public/css/uploadimage.css" />
		<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
		<style>
			form
			{
				margin:5% auto;
				width: 80%;
			}
			.layui-form-item
			{
				margin: 10px 0;
			}
			.btn2
			{
				margin: 30px 40%;
			}
		</style>
	</head>
	<body>
		<form class="layui-form" action="addbanner.php"method="post"d="passForm" enctype="multipart/form-data">
		  <div class="layui-form-item">
		    <label class="layui-form-label">banner文字</label>
		    <div class="layui-input-block">
		      <input type="text" name="text" lay-verify="required" placeholder="请输入banner文字" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">添加图片</label>
			    <div class="layui-input-block">
			      	<div class="picDiv">
				        <div class="addImages">   
				            <input type="file" class="file" id="fileInput" multiple="" accept="image/png, image/jpeg, image/gif, image/jpg"name="banner" required  >
					            <div class="text-detail">
						            <span>+</span>
						            <p>点击上传</p>
					            </div>
				        </div>
				    </div>
				    <div class="msg" style="display: none;"></div>
			    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">跳转链接</label>
		    <div class="layui-input-block">
		      <input type="text" name="address"  lay-verify="required" placeholder="请输入链接地址" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <div class="layui-input-block btn2">
		      <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
		    </div>
		  </div>
		</form>
		<script type="text/javascript" src="../public/js/uploadimage.js" ></script>
	</body>
</html>