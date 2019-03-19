<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM brand ORDER BY id DESC";
	$result1=$db->query($sql1);
	$brands=[];
	while($brand=$result1->fetch_array())
	{
		$brands[]=$brand;
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
				<th>品牌名称</th>
				<th>logo</th>
				<th>状态</th>
				<th>处理</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($brands as $brand){
			?>
			<tr>
				<td><?php echo $brand['name'];?></td>
				<td><img src="getlogo.php?id=<?php echo $brand['id'];?>"/></td>
				<td>
					<?php if($brand['state']==1):?>
						正在使用
					<?php else:?>
						已禁用
					<?php endif;?>
				</td>
				<td>
					<?php if($brand['state']==1):?>
						<button class="layui-btn layui-btn-primary layui-btn-sm"onclick="location='ban.php?id=<?php echo $brand['id'];?>'">
						  禁用
						</button>
					<?php else:?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='start.php?id=<?php echo $brand['id'];?>'">
						  启用
						</button>
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deletebrand.php?id=<?php echo $brand['id'];?>'">
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