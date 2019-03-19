<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM banner ORDER BY id";
	$max="SELECT MAX(id) FROM banner";
	$maxid=$db->query($max)->fetch_array();
	$result1=$db->query($sql1);
	$banners=[];
	while($banner=$result1->fetch_array())
	{
		$banners[]=$banner;
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
				<th>排序</th>
				<th>图片</th>
				<th>链接</th>
				<th>文字</th>
				<th>状态</th>
				<th>处理</th>
				<th>调序</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($banners as $banner){
			?>
			<tr>
				<td><?php echo $banner['id'];?></td>
				<td><img src="getbanner.php?id=<?php echo $banner['id'];?>"/></td>
				<td><a href="<?php echo $banner['address'];?>"target="_blank"><?php echo $banner['address'];?></a></td>
				<td><?php echo $banner['text'];?></td>
				<td>
					<?php if($banner['state']==1):?>
						正在使用
					<?php else:?>
						已禁用
					<?php endif;?>
				</td>
				<td>
					<?php if($banner['state']==1):?>
						<button class="layui-btn layui-btn-primary layui-btn-sm"onclick="location='ban.php?id=<?php echo $banner['id'];?>'">
						  禁用
						</button>
					<?php else:?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='start.php?id=<?php echo $banner['id'];?>'">
						  启用
						</button>
					<?php endif;?>
				</td>
				<td>
					<?php if($banner['id']==1):?>
							<a href="downsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon">&#xe61a;</i></a>
					<?php elseif($banner['id']==$maxid[0]):?>
							<a href="upsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon"style="color:#1E9FFF ;">&#xe619;</i></a>
					<?php else:?>
							<a href="upsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon"style="color:#1E9FFF ;">&#xe619;</i></a>&nbsp;&nbsp;
							<a href="downsort.php?id=<?php echo $banner['id'];?>"><i class="layui-icon">&#xe61a;</i></a>
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
		<script src="admin/public/layui/layui.all.js"></script>	

	</body>
</html>