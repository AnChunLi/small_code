<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
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
		<form class="layui-form" action="shenheuser.php?id=<?php echo $id;?>"method="post">
			  <div class="layui-form-item">
			    <label class="layui-form-label">会员等级</label>
			  <div class="layui-input-block">
			      <select name="level" lay-verify="required">
			        <option value="1">基本成员</option>
			        <option value="2">进阶成员</option>
			        <option value="3">老会员</option>
			        <option value="4">前管理层</option>
			        <option value="5">车队成员</option>
			        <option value="6">友校大佬</option>
			        <option value="7">友校高层</option>
			        <option value="8">部长</option>
			        <option value="9">副会长</option>
			        <option value="10">会长</option>
			      </select>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit lay-filter="formDemo">确认</button>
			    </div>
			  </div>
			</form>
	        <!--layui.js引入-->
			<script src="../public/layui/layui.all.js"></script>

	</body>
</html>