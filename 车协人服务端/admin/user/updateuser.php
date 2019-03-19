<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$sql="select * from user where id='$id'";
	$row=$db->query($sql)->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
			<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
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
			    <label class="layui-form-label">更新证件</label>
			    <div class="layui-input-block">
			      	<div class="picDiv">
				        <div class="addImages">
				        	<form id="uploadimage"action="uploadschoolcardimage.php"method="post"enctype="multipart/form-data"target="uploadwin">
				           		 <input type="file" class="file" id="fileInput"  accept="image/png, image/jpeg, image/gif, image/jpg"name="image"style="display: none;">
				            </form>
					            <img src="<?php echo $row['schoolcard'];?>"id="upload" />
				        </div>
				    </div>
				    <iframe name="uploadwin"style="display: none;"></iframe>
			    </div>
			</div>	
		<form class="layui-form" action="update.php?id=<?php echo $id;?>"method="post"id="form1">
			  
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改学号</label>
			    <div class="layui-input-block">
			      <input type="text" name="studentnumber" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['studentnumber'];?>'>
			    </div>
			  </div>
			  <input type="text"name="imagesrc"style="display: none;"id="imagesrc" />
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改姓名</label>
			    <div class="layui-input-block">
			      <input type="text" name="name" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['name'];?>'>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改年级</label>
			    <div class="layui-input-block">
			      <input type="text" name="grade" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['grade'];?>'>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">选择学院</label>
			  <div class="layui-input-block">
			      <select name="school" lay-verify="required"id="school">
				      	<option value="0">资环</option>
				      	<option value="1">遥感</option>
				      	<option value="2">测绘</option>
				      	<option value="3">印包</option>
				      	<option value="4">生科</option>
				      	<option value="5">物院</option>
				      	<option value="6">化院</option>
				      	<option value="7">电信</option>
				      	<option value="8">计院</option>
				      	<option value="9">数院</option>
				      	<option value="10">新传</option>
				      	<option value="11">社会</option>
				      	<option value="12">历史</option>
				      	<option value="13">文院</option>
				      	<option value="14">政管</option>
				      	<option value="15">马院</option>
				      	<option value="16">哲院</option>
				      	<option value="17">国学</option>
				      	<option value="18">信管</option>
				      	<option value="19">经管</option>
				      	<option value="20">法院</option>
				      	<option value="21">外院</option>
				      	<option value="22">动机</option>
				      	<option value="23">药院</option>
				      	<option value="24">基医</option>
				      	<option value="25">健康</option>
				      	<option value="26">口腔</option>
				      	<option value="27">电气</option>
				      	<option value="28">水院</option>
				      	<option value="29">艺术</option>
				      	<option value="30">城设</option>
				      	<option value="31">土建</option>
				      	<option value="32">国软</option>
				      	<option value="33">弘毅</option>
			      </select>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改等级</label>
			  <div class="layui-input-block">
			      <select name="level" lay-verify="required"id="level">
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
			    <label class="layui-form-label">修改电话</label>
			    <div class="layui-input-block">
			      <input type="text" name="tel" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['tel'];?>'>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改QQ</label>
			    <div class="layui-input-block">
			      <input type="text" name="qq" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['qq'];?>'>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">修改宿舍</label>
			    <div class="layui-input-block">
			      <input type="text" name="sushe" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input"value='<?php echo $row['sushe'];?>'>
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
			<script>
				$("#school option[value='<?php echo $row['school']?>']").attr("selected", true);
				$("#level option[value='<?php echo $row['level']?>']").attr("selected", true);
//			    上传图片入口转化
			    $('#upload').click(function(){
			    	$('#fileInput').click();
			    });
			    $('#fileInput').change(function(){
			    	$('#uploadimage').submit();
			    	 
			    });
			    $('#form1').click(function(){
			    	var imagesrc=$('#upload').attr('src');
			    	$('#imagesrc').val(imagesrc);
			    });
			</script>
	</body>
</html>