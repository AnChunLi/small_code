<?php
	include("../public/safe.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
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
		<form class="layui-form" action="addadmin.php"method="post">
		  <div class="layui-form-item">
		    <label class="layui-form-label">设置账号</label>
		    <div class="layui-input-block">
		      <input type="text" name="adminusername" required  lay-verify="required" placeholder="请输入所要设置的账号" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">设置密码</label>
		    <div class="layui-input-block">
		      <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">确认密码</label>
		    <div class="layui-input-block">
		      <input type="password" name="password2" required lay-verify="required" placeholder="请确认密码" autocomplete="off" class="layui-input">
		   	</div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">管理员</label>
		    <div class="layui-input-block">
		      <input type="text" name="name" required  lay-verify="required" placeholder="请输入管理员姓名" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <div class="layui-input-block btn2">
		      <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
		      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		  </div>
		</form>
	
	</body>
</html>
