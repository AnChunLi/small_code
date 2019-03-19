<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM class";
	$sql2="SELECT * FROM brand";
	$sql3="SELECT * FROM specification";
	$result1=$db->query($sql1);
	$result2=$db->query($sql2);
	$result3=$db->query($sql3);
	$classes=[];
	$brands=[];
	$specifications=[];
	while($class=$result1->fetch_array())
	{
		$classes[]=$class;
	}
	while($brand=$result2->fetch_array())
	{
		$brands[]=$brand;
	}
	while($specification=$result3->fetch_array())
	{
		$specifications[]=$specification;
	}
	$id=$_GET['id'];
	$sql="SELECT * FROM goods WHERE id='$id'";
	$row=$db->query($sql)->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
			<!--引入富文本编辑器-->
		<script type="text/javascript" charset="utf-8" src="../public/ueditor/ueditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="../public/ueditor/ueditor.all.min.js"></script>
	    <script type="text/javascript" charset="utf-8" src="../public/ueditor/lang/zh-cn/zh-cn.js"></script>
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
		<form class="layui-form" action="update.php?id=<?php echo $id;?>"method="post">
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改名称</label>
			    <div class="layui-input-block">
			      <input type="text" name="name" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['name'];?>'>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改分类</label>
			  <div class="layui-input-block">
			      <select name="class" lay-verify="required">
			      	<?php foreach($classes as $class){?>
			      		<?php if($class['state']==1):?>
			        <option value="<?php echo $class['name'];?>"><?php echo $class['name'];?></option>
			        	<?php endif;?>
			        <?php } ?>
			      </select>
			    </div>
			  </div>
			   <div class="layui-form-item">
			    <label class="layui-form-label">修改品牌</label>
			  <div class="layui-input-block">
			      <select name="brand" lay-verify="required">
			      	<?php foreach($brands as $brand){?>
			      		<?php if($brand['state']==1):?>
			        <option value="<?php echo $brand['name'];?>"><?php echo $brand['name'];?></option>
			        	<?php endif;?>
			        <?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改状态</label>
			    <div class="layui-input-block">
			      <input type="radio" name="state" value="1" title="上架"checked>
			      <input type="radio" name="state" value="0" title="下架" >
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">设置售价</label>
			    	<div class="layui-input-inline" style="width: 100px;">
				      <input type="text" name="price" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['price'];?>'>
				    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">设置库存</label>
			    	<div class="layui-input-inline" style="width: 100px;">
				      <input type="text" name="kucun" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['kucun'];?>'>
				    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">设置销量</label>
			    	<div class="layui-input-inline" style="width: 100px;">
				      <input type="text" name="sales" value="<?php echo $row['sales'];?>" autocomplete="off" class="layui-input">
				    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">规格设置</label>
			  <div class="layui-input-block">
			      <select name="specification" lay-verify="required">
			      	<?php foreach($specifications as $specification){?>
			      		<?php if($specification['state']==1):?>
			        <option value="<?php echo $specification['id'];?>"><?php echo $specification['name'];?></option>
			        	<?php endif;?>
			        <?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">商品详情</label>
			    <div class="layui-input-block">
			      <script id="editor" type="text/plain" name="details" style="width:100%;height:400px;"><?php echo $row['details'];?></script>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit lay-filter="formDemo">保存</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
			  </div>
			</form>
	
			<!--layui.js引入-->
			<script src="../public/layui/layui.all.js"></script>
			<script type="text/javascript">
			        //实例化编辑器
			        var ue = UE.getEditor('editor', {});
			</script>
	</body>
</html>
