<html>
<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title>车协人租车后台</title>
		<link rel="stylesheet" href="public/layui/css/layui.css">
		<style>
			body
			{
				background-color: #393D49;
			}
			form
			{
				margin:2% 26%;
				width: 40%;
			}
			.layui-form-item
			{
				margin: 10px 0;
			}
			.btn2
			{
				margin: 30px 0;
			}
			.title
			{
				color: #01AAED;
				font-size: 50px;
				margin-top: 10%;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="title">车协人租车管理</div>
		<form class="layui-form" action="public/login.php"method="post">
		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <input type="text" name="adminusername" required  lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <input type="password" name="password"  lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn btn2 layui-btn-fluid layui-btn-radius layui-btn-normal" lay-submit lay-filter="formDemo">登录</button>
		    </div>
		  </div>
		</form>
	</body>
</html>
