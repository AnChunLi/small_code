<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM indent where finish='0' ORDER BY id DESC";
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
				<th>预约人</th>
				<th>等级</th>
				<th>预约时间</th>
				<th>内容</th>
				<th>电话</th>
				<th>处理</th>
			</tr>
			</thead>
			<tbody>
			<?php
				while($row=$result->fetch_array())
				{
					$userid=$row['userid'];
					$sql1="SELECT * FROM user where id='$userid'";
					$result1=$db->query($sql1);
					$row1=$result1->fetch_array();
			?>
			<tr>
				<td><?php echo $row1['studentnumber'];?></td>
				<td><?php echo $row1['name'];?></td>
				<td>
					<?php if($row1['level']==1):?>
						基本成员
					<?php elseif($row1['level']==2):?>
						进阶成员
					<?php elseif($row1['level']==3):?>
						老会员
					<?php elseif($row1['level']==4):?>
						前管理层
					<?php elseif($row1['level']==5):?>
						车队成员
					<?php elseif($row1['level']==6):?>
						友校大佬
					<?php elseif($row1['level']==7):?>
						友校高层
					<?php elseif($row1['level']==8):?>
						部长
					<?php elseif($row1['level']==9):?>
						副会长、
					<?php elseif($row1['level']==10):?>
						会长
					<?php endif;?>		
				</td>
				<td><?php echo date('Y-m-d H:i:s',$row['time']+8*3600);?></td>
				<td><?php echo $row['text'];?></td>
				<td><?php echo $row1['tel'];?></td>
				
				<td>
					<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='finishorder.php?id=<?php echo $row['id'];?>'">
					  完成
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