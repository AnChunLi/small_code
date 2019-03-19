<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM zucheindent ORDER BY id DESC";
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
		</style>
	</head>
	<body>
		<table class="layui-table"lay-even lay-skin="line" lay-size="lg">
			<colgroup>
			    <col width="200">
			    <col width="200">
			    <col>
			</colgroup>
			<thead>
			<tr>
				<th>自行车名称</th>
				<th>图片</th>
				<th>客户姓名</th>
				<th>期限</th>
				<th>电话</th>
				<th>下单时间</th>
				<th>借车时间</th>
				<th>归还时间</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<?php
					while($row1=$result1->fetch_array())
					{
						$bycycleid=$row1['bycycleid'];
						$userid=$row1['userid'];
						$sql2="SELECT * FROM bycycle where id='$bycycleid'";
						$sql3="SELECT * FROM user  where id='$userid'";
						$result2=$db->query($sql2);
						$result3=$db->query($sql3);
						$row2=$result2->fetch_array();
						$row3=$result3->fetch_array();
			?>
			<tr>
				<td><?php echo $row2['name'];?></td>
				<td><img src="<?php echo $row2['image'];?>"/></td>
				<td><?php echo $row3['name'];?></td>
				<td><?php echo $row1['during'];?></td>
				<td><?php echo $row3['tel'];?></td>
				<td><?php echo date("Y-m-d H:i",$row1['time']);?></td>
				<td><?php if($row1['zuchetime']!='0')echo date("Y-m-d H:i",$row1['zuchetime']);?></td>
				<td><?php if($row1['finishtime']!='0')echo date("Y-m-d H:i",$row1['finishtime']);?></td>
				<td>
					<?php if($row1['state']==0):?>
						未租出
					<?php elseif($row1['state']==1):?>
						租赁中
					<?php elseif($row1['state']==2):?>
						已还车
					<?php endif;?>
				</td>
				<td>
					<?php if($row1['state']==0):?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='delivery.php?id=<?php echo $row1['id'];?>&&bycycleid=<?php echo $row1['bycycleid'];?>'">
						 租出
						</button>
					<?php elseif(($row1['state']==1)):?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='returnindent.php?id=<?php echo $row1['id'];?>&&bycycleid=<?php echo $row1['bycycleid'];?>'">
						 确认还车
						</button>
					<?php endif;?>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		

		
		<!--layui.js引入-->
		<script src="admin/public/layui/layui.all.js"></script>	

	</body>
</html>