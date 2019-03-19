<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM goods ORDER BY id DESC";
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
		<button class="layui-btn layui-btn-sm"onclick="location='addgoods.php'"style="float: right;">
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
				<th>名称</th>
				<th>价格</th>
				<th>分类</th>
				<th>所属品牌</th>
				<th>库存</th>
				<th>销量</th>
				<th>图片</th>
				<th>详情</th>
				<th>状态</th>
				<th>修改</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($rows as $row){
			?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['class'];?></td>
				<td><?php echo $row['brand'];?></td>
				<td><?php echo $row['kucun'];?></td>
				<td><?php echo $row['sales'];?></td>
				<td><img src="<?php echo $row['imagesrc'];?>"/></td>
				<td><?php echo $row['details'];?></td>
				<td>
					<?php if($row['state']==1):?>
						上架
					<?php else:?>
						下架
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='updategoods.php?id=<?php echo $row['id'];?>'">
					  <i class="layui-icon">&#xe642;</i> 修改
					</button>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deletegoods.php?id=<?php echo $row['id'];?>'">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</body>
</html>
