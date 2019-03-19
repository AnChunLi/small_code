<?php
	include("../../public/common/config.php");
	include("../public/safe.php");
	$sql1="SELECT * FROM indent ORDER BY id DESC";
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
				<th>订单号</th>
				<th>商品名称</th>
				<th>图片</th>
				<th>客户姓名</th>
				<th>地址</th>
				<th>电话</th>
				<th>下单时间</th>
				<th>发货时间</th>
				<th>实际价格</th>
				<th>状态</th>
				<th>操作</th>
				<th>删除</th>
			</tr>
			</thead>
			<tbody>
			<?php
					while($row1=$result1->fetch_array())
					{
						$goodsid=$row1['goods_id'];
						$userid=$row1['user_id'];
						$sql2="SELECT * FROM goods where id='$goodsid'";
						$sql3="SELECT * FROM user  where id='$userid'";
						$result2=$db->query($sql2);
						$result3=$db->query($sql3);
						$row2=$result2->fetch_array();
						$row3=$result3->fetch_array();
			?>
			<tr>
				<td><?php echo $row1['indentid'];?></td>
			
				<td><?php echo $row2['name'];?></td>
				<td><img src="../goods/getimage.php?id=<?php echo $row2['id'];?>"/></td>
			
			
				<td><?php echo $row3['username'];?></td>
				<td><?php echo $row3['address'];?></td>
				<td><?php echo $row3['tel'];?></td>
			
				<td><?php echo date("Y-m-d H:i",$row1['paytime']+8*3600);?></td>
				<td><?php echo date("Y-m-d H:i",$row1['deliverytime']+8*3600);?></td>
				<td><?php echo $row1['realprice'];?></td>
				<td>
					<?php if($row1['state']==1):?>
						已付款下单
					<?php elseif($row1['state']==2):?>
						已发货
					<?php elseif($row1['state']==3):?>
						已收货
					<?php elseif($row1['state']==4):?>
						退货中
					<?php elseif($row1['state']==5):?>
						已退货
					<?php endif;?>
				</td>
				<td>
					<?php if($row1['state']==1):?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='delivery.php?id=<?php echo $row1['id'];?>'">
						  发货
						</button>
					<?php elseif(($row1['state']<=3)):?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='returnindent.php?id=<?php echo $row1['id'];?>'">
						  退货
						</button>
					<?php elseif(($row1['state']==4)):?>
						<button class="layui-btn layui-btn-normal layui-btn-sm"onclick="location='finishreturn.php?id=<?php echo $row1['id'];?>'">
						  退货完成
						</button>
					<?php endif;?>
				</td>
				<td>
					<button class="layui-btn layui-btn-danger layui-btn-sm"onclick="location='deleteindent.php?id=<?php echo $row1['id'];?>'">
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