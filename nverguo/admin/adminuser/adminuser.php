<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM adminuser ORDER BY id DESC";
	$result=$db->query($sql);
	$rows=[];
	while($row=$result->fetch_array())
	{
		if($_SESSION['adminid']!=1)
		{
			echo "<script> alert('你没有访问权限！');</script>";
			exit;
		}
		else
			{
				$rows[]=$row;
			}
		
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
		<button class="layui-btn layui-btn-sm"onclick="location='addadmin0.php'"style="float: right;">
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
				<th>管理员账号</th>
				<th>密码</th>
				<th>姓名</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($rows as $row){
			?>
			<tr>
				<td><?php echo $row['adminusername'];?></td>
				<td><?php echo $row['password'];?></td>
				<td><?php echo $row['name'];?></td>
				<?php if($row['id']!=1):?>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deleteadmin.php?id=<?php echo $row['id'];?>'">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
				<?php else:?>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm layui-btn-disabled"disabled="disabled"  onclick="location='deleteadmin.php?id=<?php echo $row['id'];?>'">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
				<?php endif; ?>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		

		
		<!--layui.js引入-->
		<script src="admin/public/layui/layui.all.js"></script>	

	</body>
</html>
