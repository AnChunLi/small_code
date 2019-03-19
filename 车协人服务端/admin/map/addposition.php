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
				margin:2% auto;
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
		</style>
	</head>
	<body onload="init()">
		<form class="layui-form" action="add.php"method="post">
		  <div class="layui-form-item">
		    <label class="layui-form-label">地点名称</label>
		    <div class="layui-input-block">
		      <input type="text" name="name" required  lay-verify="required" placeholder="请输入地点名称" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">选择坐标</label>
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
		    <div class="layui-input-block btn2">
		      <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
		    </div>
		  </div>
		</form>
		<script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp"></script>
		<script>
					//引用腾讯地图坐标拾取器
			var init= function(){
			    var map = new qq.maps.Map(document.getElementById("container"),{
			        center: new qq.maps.LatLng(30.539347,114.363899),
			        zoom: 14,
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