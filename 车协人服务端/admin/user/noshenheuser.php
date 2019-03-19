<?php
	include("../../config.php");
	include("../public/safe.php");
	$sql="SELECT * FROM user where shenhe='0' and id!=1 ORDER BY id DESC";
	$result=$db->query($sql);
	$i=0;
	$rows=[];
	while($row=$result->fetch_array())
	{
		$rows[]=$row;
		$i++;
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
		<!--<button class="layui-btn layui-btn-sm"onclick="location='addadmin.html'"style="float: right;">
		  <i class="layui-icon">&#xe608;</i> 添加
		</button>-->
		<h3 style="text-align: center;">未审核成员为：<?php echo $i;?></h3>
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
				<th>证件</th>
				<th>性别</th>
				<th>年级</th>
				<th>学院</th>
				<th>等级</th>
				<th>电话</th>
				<th>QQ</th>
				<th>宿舍</th>
				<th>审核</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($rows as $row){
			?>
			<tr>
				<td><?php echo $row['studentnumber'];?></td>
				<td><?php echo $row['name'];?></td>
				<td class="layer-photos-demo"id="layer-photos-demo"><img src="../../<?php echo $row['schoolcard'];?>"layer-src="../../<?php echo $row['schoolcard'];?>"/></td>
				<td>
					<?php if($row['gender']==0):?>
					男
					<?php elseif($row['gender']==1):?>
					女
					<?php endif;?>
				</td>
				<td><?php echo $row['grade'];?></td>
				<td>
					<?php if($row['school']==0):?>
						资环
					<?php elseif($row['school']==1):?>
						遥感
					<?php elseif($row['school']==2):?>
						测绘
					<?php elseif($row['school']==3):?>
						印包
					<?php elseif($row['school']==4):?>
						生科
					<?php elseif($row['school']==5):?>
						物院
					<?php elseif($row['school']==6):?>
						化院
					<?php elseif($row['school']==7):?>
						电信
					<?php elseif($row['school']==8):?>
						计院
					<?php elseif($row['school']==9):?>
						数院
					<?php elseif($row['school']==10):?>
						新传
					<?php elseif($row['school']==11):?>
						社会
					<?php elseif($row['school']==12):?>
						历史
					<?php elseif($row['school']==13):?>
						文院
					<?php elseif($row['school']==14):?>
						政管
					<?php elseif($row['school']==15):?>
						马院
					<?php elseif($row['school']==16):?>
						哲院
					<?php elseif($row['school']==17):?>
						国学
					<?php elseif($row['school']==18):?>
						信管
					<?php elseif($row['school']==19):?>
						经管
					<?php elseif($row['school']==20):?>
						法院
					<?php elseif($row['school']==21):?>
						外院
					<?php elseif($row['school']==22):?>
						动机
					<?php elseif($row['school']==23):?>
						药院
					<?php elseif($row['school']==24):?>
						基医
					<?php elseif($row['school']==25):?>
						健康
					<?php elseif($row['school']==26):?>
						口腔
					<?php elseif($row['school']==27):?>
						电气
					<?php elseif($row['school']==28):?>
						水院
					<?php elseif($row['school']==29):?>
						艺术
					<?php elseif($row['school']==30):?>
						城设
					<?php elseif($row['school']==31):?>
						土建
					<?php elseif($row['school']==32):?>
						国软
					<?php elseif($row['school']==33):?>
						弘毅
					<?php endif;?>	
				</td>
				<td>暂未分配</td>
				<td><?php echo $row['tel'];?></td>
				<td><?php echo $row['qq'];?></td>
				<td><?php echo $row['sushe'];?></td>
				<td>
					<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='shenhe.php?id=<?php echo $row['id'];?>'">
					  <i class="layui-icon"></i> 通过
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="if(confirm('确实要删除该内容吗?')){location='deleteuser.php?id=<?php echo $row['id'];?>'}">
					  <i class="layui-icon">&#xe640;</i> 删除
					</button>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		

		
		<!--layui.js引入-->
		<script src="../public/layui/layui.all.js"></script>	
		<script>
			layer.photos({
			  photos: '#layer-photos-demo'
			  ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
			}); 
		</script>

	</body>
</html>