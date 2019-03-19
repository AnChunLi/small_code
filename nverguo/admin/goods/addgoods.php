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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
		<!--<link rel="stylesheet" href="../public/css/uploadimage.css" />-->
		<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
		<!--引入富文本编辑器-->
		<script type="text/javascript" charset="utf-8" src="../public/ueditor/ueditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="../public/ueditor/ueditor.all.min.js"></script>
	    <script type="text/javascript" charset="utf-8" src="../public/ueditor/lang/zh-cn/zh-cn.js"></script>
		<style>
			.form1
			{
				margin:1% auto 5% auto;
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
			/*上传图片样式*/
			.addImages img
			{
				width: 120px;
				height: 120px;
			}
			.addimage
			{
				margin-left: 10%;
			}
		</style>
	</head>
	<body>
		<div class="layui-form-item layui-form-text addimage">
			    <label class="layui-form-label">添加图片</label>
			    <div class="layui-input-block">
			      	<div class="picDiv">
				        <div class="addImages">
				        	<form id="uploadimage"action="uploadgoodsimage.php"method="post"enctype="multipart/form-data"target="uploadwin">
				           		 <input type="file" class="file" id="fileInput"  accept="image/png, image/jpeg, image/gif, image/jpg"name="image"style="display: none;">
				            </form>
					            <!--<div class="text-detail">
						            <span>+</span>
						            <p>点击上传</p>
					            </div>-->
					            <img src="../../home/public/img/addimage.jpg"id="upload" />
				        </div>
				    </div>
				    <!--<div class="msg" style="display: none;"></div>-->
				    <iframe name="uploadwin"style="display: none;"></iframe>
			    </div>
			</div>	
		<form class="layui-form form1" action="add.php"method="post"id="passForm" enctype="multipart/form-data">
			  <div class="layui-form-item">
			    <label class="layui-form-label">商品名称</label>
			    <div class="layui-input-block">
			      <input type="text" name="name" required  lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
			    </div>
			  </div>
			  <input type="text"name="imagesrc"style="display: none;"id="imagesrc" />
			  <div class="layui-form-item">
			    <label class="layui-form-label">选择分类</label>
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
			    <label class="layui-form-label">选择品牌</label>
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
			  <div class="layui-form-item">
			    <label class="layui-form-label">状态</label>
			    <div class="layui-input-block">
			      <input type="radio" name="state" value="1" title="上架"checked>
			      <input type="radio" name="state" value="0" title="下架" >
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">设置售价</label>
			    	<div class="layui-input-inline" style="width: 100px;">
				      <input type="text" name="price" placeholder="￥" autocomplete="off" class="layui-input">
				    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">设置库存</label>
			    	<div class="layui-input-inline" style="width: 100px;">
				      <input type="text" name="kucun" placeholder="库存" autocomplete="off" class="layui-input">
				    </div>
			  </div>
			  <div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">商品详情</label>
			    <div class="layui-input-block">
			      	<script id="editor" type="text/plain" name="details" style="width:100%;height:400px;"></script>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit lay-filter="formDemo"id="formsubmit">提交</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
			  </div>
			</form>
	        <!--layui.js引入-->
			<script src="../public/layui/layui.all.js"></script>
			<!--<script type="text/javascript" src="../public/js/uploadimage.js" ></script>-->
			<script type="text/javascript">
			    //实例化编辑器
			    var ue = UE.getEditor('editor', {});
//			    上传图片入口转化
			    $('#upload').click(function(){
			    	$('#fileInput').click();
			    });
			    $('#fileInput').change(function(){
			    	$('#uploadimage').submit();
			    	 
			    });
			    $('#formsubmit').click(function(){
			    	var imagesrc=$('#upload').attr('src');
			    	 console.log(imagesrc);
			    	$('#imagesrc').val(imagesrc);
			    });
			    
			    
//			    	var imagesrc='';
//			    	var picDiv = $(this).parents(".picDiv");
//			    	var imagehtml="<div class='imageDiv' > <img src='"+imagesrc+"'/> <div class='cover'><i class='delbtn'>删除</i></div></div>";
//			    	picDiv.prepend(imagehtml);
			   
			</script>
	</body>
</html>
