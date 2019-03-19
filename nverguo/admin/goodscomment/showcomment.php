<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM goodscomment ORDER BY id DESC";
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
				<th>商品</th>
				<th>图片</th>
				<th>用户</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($row=$result->fetch_array())
				{
					$goods_id=$row['goods_id'];
					$user_id=$row['user_id'];
					$sql1="select * from goods where id='$goods_id'";
					$sql2="select * from user where id='$user_id'";
					$row1=$db->query($sql1)->fetch_array();
					$row2=$db->query($sql2)->fetch_array();
			?>
			<tr>
				<td><?php echo $row['text'];?></td>
				<td><?php echo $row1['name'];?></td>
				<td><img src="../goods/getimage.php?id=<?php echo $row1['id'];?>"/></td>
				<td><?php echo $row2['username'];?></td>
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
