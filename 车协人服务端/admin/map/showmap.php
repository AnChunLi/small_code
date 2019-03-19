<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="select * from map order by id desc";
	$result=$db->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../public/layui/css/layui.css">
		<style>
			button
			{
				margin: 15px;
			}
			body
			{
				padding: 0 10%;
			}
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"style="float: right;"onclick="location='addposition.php'">
		  <i class="layui-icon">&#xe608;</i> 添加地点
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>名称</th>
				<th>经度</th>
				<th>纬度</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
					while($row=$result->fetch_array())
					{
			?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['longitude'];?></td>
				<td><?php echo $row['latitude'];?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="if(confirm('确实要删除该内容吗?')){location='deleteposition.php?id=<?php echo $row['id'];?>'}">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<!--layui.js引入-->
		<script src="../public/layui/layui.all.js"></script>
		
	</body>
</html>