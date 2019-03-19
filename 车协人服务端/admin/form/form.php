<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM testpaper ORDER BY id";
	$result1=$db->query($sql1);
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
			.input img
			{
				width: 80px;
				height: 80px;
			}
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"style="float: right;"onclick="location='addform.php'">
		  <i class="layui-icon">&#xe608;</i> 添加问卷
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="200">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>问卷名称</th>
				<th>题数</th>
				<th>答题人数</th>
				<th>查看问卷</th>
				<th>状态</th>
				<th>处理</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($form=$result1->fetch_array())
				{
			?>
			<tr>
				<td><?php echo $form['id'];?></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					<?php if($form['state']==1):?>
						已开启答题
					<?php else:?>
						禁止答题
					<?php endif;?>
				</td>
				<td>
					<?php if($form['state']==1):?>
						<button class="layui-btn layui-btn-primary layui-btn-sm"onclick="location='ban.php?id=<?php echo $banner['id'];?>'">
						  停止
						</button>
					<?php else:?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='start.php?id=<?php echo $banner['id'];?>'">
						  开启
						</button>
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deletebanner.php?id=<?php echo $banner['id'];?>'">
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