<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM comment ORDER BY id DESC";
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
		<!--<button class="layui-btn layui-btn-sm"onclick="location='addadmin0.php'"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 添加-->
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>评论内容</th>
				<th>动态内容</th>
				<th>动态图片</th>
				<th>用户</th>
				<th>用户昵称</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($row=$result->fetch_array())
				{
					$release_id=$row['release_id'];
					$user_id=$row['userid'];
					$sql1="select * from releases where id='$release_id'";
					$sql2="select * from user where id='$user_id'";
					$row1=$db->query($sql1)->fetch_array();
					$row2=$db->query($sql2)->fetch_array();
			?>
			<tr>
				<td><?php echo $row['text'];?></td>
				<td><?php echo $row1['text'];?></td>
				<td><img src="<?php echo $row1['imagesrc'];?>"/></td>
				<td><?php echo $row2['username'];?></td>
				<td><?php echo $row2['name'];?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm" onclick="location='deletecomment.php?id=<?php echo $row['id'];?>'">
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
