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
			#container{
				width:600px;
				height:400px;
			}
			/*上传图片样式*/
			.addImages img
			{
				width: 80px;
				height: 80px;
			}
			.addimage
			{
				margin-left: 10%;
			}
			.layui-form-label
			{
				width: 100px;
			}
		</style>
	</head>
	<body onload="init()">
		<div class="layui-form-item layui-form-text addimage">
			    <label class="layui-form-label">自行车图片</label>
			    <div class="layui-input-block">
				        <div class="addImages">
				        	<form id="uploadimage"action="uploadimage.php"method="post"enctype="multipart/form-data"target="uploadwin">
				           		 <input type="file" class="file" id="fileInput"  accept="image/png, image/jpeg, image/gif, image/jpg"name="image"style="display: none;">
				            </form>
					            <img src="../public/img/addimage.jpg"id="upload" />
				        </div>
				    <iframe name="uploadwin"style="display: none;"></iframe>
			    </div>
			</div>	
		<form class="layui-form" action="add.php"method="post" >
			  <div class="layui-form-item">
			    <label class="layui-form-label">名称</label>
			    <div class="layui-input-block">
			      <input type="text" name="name" required  lay-verify="required" placeholder="请输入自行车名称" autocomplete="off" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">原价</label>
			    <div class="layui-input-block">
			      <input type="text" name="price" required  lay-verify="required" placeholder="车辆原价" autocomplete="off" class="layui-input">
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">租价</label>
			    <div class="layui-input-block">
			      <input type="text" name="zucheprice" required  lay-verify="required" placeholder="租赁价格" autocomplete="off" class="layui-input">
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">库存</label>
			    <div class="layui-input-block">
			      <input type="text" name="num" required  lay-verify="required" placeholder="库存" autocomplete="off" class="layui-input">
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">车店名称</label>
			    <div class="layui-input-block">
			      <input type="text" name="shop" required  lay-verify="required" placeholder="车店名称" autocomplete="off" class="layui-input">
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">车店电话</label>
			    <div class="layui-input-block">
			      <input type="text" name="tel" required  lay-verify="required" placeholder="车店电话" autocomplete="off" class="layui-input">
			  </div>
			  <input type="text"name="imagesrc"style="display: none;"id="imagesrc" />
			  <div class="layui-form-item">
			    <label class="layui-form-label">地址</label>
					<div class="layui-input-block">
			            纬度<input id="latitude" type="text"name="latitude"/>
			            经度<input id="longitude" type="text"name="longitude"/>
			            <div id="main">
			            	<div style="width:603px;" id="latLng"></div>
					        <div id="container"></div>
				        </div>
			    	</div>
			  </div>
		  
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit lay-filter="formDemo"id="form1">提交</button>
			    </div>
			  </div>
			</form>
		
		
	        <!--layui.js引入-->
			<script src="../public/layui/layui.all.js"></script>
			<script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp"></script>
			<script>
			
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
					//引用腾讯地图坐标拾取器
			var init= function(){
			    var map = new qq.maps.Map(document.getElementById("container"),{
			        center: new qq.maps.LatLng(30.539347,114.363899),
			        zoom: 10,
			    });
			    map.setOptions({
				    draggableCursor: "crosshair"
				});
			    qq.maps.event.addListener(map,'click',function(event) {
			        var latLng = event.latLng,
			            lat = latLng.getLat().toFixed(5),
			            lng = latLng.getLng().toFixed(5);
			        document.getElementById("latLng").innerHTML = lat+','+lng;
			        document.getElementById("latitude").value=lat;
			        document.getElementById("longitude").value=lng;
			    });
			    qq.maps.event.addListener(map,'mousemove',function(event) {
			    	var latLng = event.latLng,
			            lat = latLng.getLat().toFixed(5),
			            lng = latLng.getLng().toFixed(5);
			        document.getElementById("latLng").innerHTML= lat+','+lng;
				});
			}
			</script>

	</body>
</html>