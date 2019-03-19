<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM releases ORDER BY id DESC";
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
		</style>
	</head>
	<body>
		<button class="layui-btn layui-btn-sm"onclick="location='publish.php'"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 发布公告
		</button>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>用户名</th>
				<th>昵称</th>
				<th>内容</th>
				<th>图片</th>
				<th>时间</th>
				<th>点赞数</th>
				<th>转发数</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($row=$result->fetch_array())
				{
					$userid=$row['userid'];
					$sqluser="select * from user where id='$userid'";
					$userinformation=$db->query($sqluser)->fetch_array();
			?>
			<tr>
				<td><?php echo $userinformation['username'];?></td>
				<td><?php echo $userinformation['name'];?></td>
				<td><?php echo $row['text'];?></td>
				<td><img src="<?php echo $row['imagesrc'];?>"/></td>
				<td><?php echo date("Y-m-d H:i",$row['intime']+8*3600);?></td>
				<td><?php echo $row['likenum'];?></td>
				<td><?php echo $row['forwording_num'];?></td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deleterelease.php?id=<?php echo $row['id'];?>'">
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