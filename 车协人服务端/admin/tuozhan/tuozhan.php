<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM tuozhan ORDER BY id DESC";
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
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="150">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>玩过的车型</th>
				<th>有兴趣加入车队？</th>
				<th>是否有在马路上骑车的经验？</th>
				<th>最长的一次骑行里程</th>
				<th>是否有兴趣做管理层</th>
				<th>是否为港澳台/留学生</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($row=$result->fetch_array())
				{
					$userid=$row['userid'];
					$sql1="select * from user where id='$userid'";
					$userrow=$db->query($sql1)->fetch_array();
			?>
			<tr>
				<td><?php echo $userrow['studentnumber'];?></td>
				<td><?php echo $userrow['name'];?></td>
				<td><?php if($row['biketype']==0):?>
					公路车
					<?php elseif($row['biketype']==1):?>
					山地车
					<?php elseif($row['biketype']==2):?>
					共享单车
					<?php elseif($row['biketype']==3):?>
					死飞
					<?php elseif($row['biketype']==4):?>
					BMX/街车
					<?php elseif($row['biketype']==5):?>
					速降
					<?php elseif($row['biketype']==6):?>
					通勤用自行车
					<?php endif;?>					
				</td>
				<td>
					<?php if($row['joinchedui']==0):?>
					否
					<?php elseif($row['joinchedui']==1):?>
					是
					<?php endif;?>
				</td>
				<td>
					<?php if($row['cycle']==0):?>
					否
					<?php elseif($row['cycle']==1):?>
					是
					<?php endif;?>
				</td>
				<td><?php echo $row['distance'];?></td>
				<td>
					<?php if($row['joinguanli']==0):?>
					否
					<?php elseif($row['joinguanli']==1):?>
					是
					<?php endif;?>
				</td>
				<td>
					<?php if($row['gat']==0):?>
					否
					<?php elseif($row['gat']==1):?>
					是
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm" onclick="location='deletetuozhan.php?id=<?php echo $row['id'];?>'">
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
