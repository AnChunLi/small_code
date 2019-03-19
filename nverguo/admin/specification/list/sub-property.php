<?php
	include("../../../public/common/config.php");
	include("../../public/safe.php");
	$id=$_GET['id'];
	$sql="SELECT * FROM specificationlist where classid='$id'  ORDER BY id DESC";
	$result=$db->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../public/layui/css/layui.css">
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
		<button class="layui-btn layui-btn-sm"onclick="location='add.php'"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 添加
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="200">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>属性</th>
				<th>所属规格</th>
				<th>状态</th>
				<th>处理</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($row=$result->fetch_array())
				{
					$classid=$row['classid'];
					$sql1="select * from specification where id='$classid'";
					$row1=$db->query($sql1)->fetch_array();
			?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row1['name'];?></td>
				<td>
					<?php if($row['state']==1):?>
						正在使用
					<?php else:?>
						已禁用
					<?php endif;?>
				</td>
				<td>
					<?php if($row['state']==1):?>
						<button class="layui-btn layui-btn-primary layui-btn-sm"onclick="location='ban.php?id=<?php echo $row['id'];?>'">
						  禁用
						</button>
					<?php else:?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='start.php?id=<?php echo $row['id'];?>'">
						  启用
						</button>
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='delete.php?id=<?php echo $row['id'];?>'">
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