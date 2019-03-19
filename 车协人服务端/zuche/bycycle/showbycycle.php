<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="select * from bycycle order by id desc";
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
				padding: 0 2%;
			}
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"style="float: right;"onclick="location='addbycycle.php'">
		  <i class="layui-icon">&#xe608;</i> 添加自行车
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
				<th>图片</th>
				<th>原价</th>
				<th>租价</th>
				<th>库存</th>
				<th>剩余</th>
				<th>车店名称</th>
				<th>电话</th>
				<th>地址</th>
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
				<td><img src="<?php echo $row['image'];?>"/></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['zucheprice'];?></td>
				<td><?php echo $row['num'];?></td>
				<td><?php echo $row['remain'];?></td>
				<td><?php echo $row['shop'];?></td>
				<td><?php echo $row['tel'];?></td>
				<td><?php echo $row['latitude'];?>,<?php echo $row['longitude'];?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="if(confirm('确实要删除该内容吗?')){location='deletebycycle.php?id=<?php echo $row['id'];?>'}">
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