<?php
	include("../../../public/common/config.php");
	include("../../public/safe.php");
	$sql="select * from specification order by id desc";
	$result=$db->query($sql);
	$classes=[];
	while($class=$result->fetch_array())
	{
		$classes[]=$class;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../public/layui/css/layui.css">
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
		<form class="layui-form" action="add1.php"method="post">
		  <div class="layui-form-item">
		    <label class="layui-form-label">添加属性</label>
		    <div class="layui-input-block">
		      <input type="text" name="name" required  lay-verify="required" placeholder="请输入属性" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
			    <label class="layui-form-label">所属规格</label>
			  <div class="layui-input-block">
			      <select name="class" lay-verify="required">
			      	<?php foreach($classes as $class){?>
			      		<?php if($class['state']==1):?>
			        <option value="<?php echo $class['id'];?>"><?php echo $class['name'];?></option>
			        	<?php endif;?>
			        <?php } ?>
			      </select>
			    </div>
			  </div>
		  <div class="layui-form-item">
		    <div class="layui-input-block btn2">
		      <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
		    </div>
		  </div>
		</form>
		<script src="../../public/layui/layui.all.js"></script>
	</body>
</html>