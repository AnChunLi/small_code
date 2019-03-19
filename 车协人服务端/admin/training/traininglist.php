<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM training ORDER BY id DESC";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		$rows[]=$row;
	}
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
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"onclick="location='addtraining.php'"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 添加
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>活动名称</th>
				<th>活动图片</th>
				<th>时间段</th>
				<th>地点</th>
				<th>经纬度</th>
				<th>活动说明</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($rows as $row){
			?>
			<tr>
				<td><?php echo $row['title'];?></td>
				<td><img src="<?php echo $row['image']?>"/></td>
				<td><?php echo $row['starttime'];?>——<?php echo $row['overtime'];?></td>
				<td><?php echo $row['place'];?></td>
				<td><?php echo $row['latitude'];?>,<?php echo $row['longitude'];?></td>
				<td><?php echo $row['text'];?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deletetraining.php?id=<?php echo $row['id'];?>'">
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