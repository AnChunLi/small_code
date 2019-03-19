<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM user ORDER BY id DESC";
	$result=$db->query($sql);
	$i=0;
	$rows=[];
	while($row=$result->fetch_array())
	{
		$rows[]=$row;
		$i++;
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
		<!--<button class="layui-btn layui-btn-sm"onclick="location='addadmin.html'"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 添加
		</button>-->
		<h3 style="text-align: center;">当前用户为：<?php echo $i;?></h3>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>用户名</th>
				<th>姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>所在地</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($rows as $row){
			?>
			<tr>
				<td><?php echo $row['username'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['gender'];?></td>
				<td><?php echo $row['age'];?></td>
				<td><?php echo $row['address'];?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deleteuser.php?id=<?php echo $row['id'];?>'">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		

		
		<!--layui.js引入-->
		<script src="admin/public/layui/layui.all.js"></script>	

	</body>
</html>