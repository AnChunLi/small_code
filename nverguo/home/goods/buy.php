<?php
	include("../../public/common/config.php");
	include("../public/top.php");
	if(!isset($_SESSION['id']))
	{
		echo "<script>parent.location.href='../login/Login.html'</script>";
		exit;
	}
	$num=$_POST['num'];
	$id=$_GET['id'];
	$sql="select * from goods where id='$id'";
	$row=$db->query($sql)->fetch_array();
	$userid=$_SESSION['id'];
	$sql="select * from user where id='$userid'";
	$row1=$db->query($sql)->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="..//ui/css/bootstrap.css">
		<script src="../ui/js/jquery-1.12.4.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<style>
		body
		{
			margin-top: 51px;
			width: 100%;
		}
		.confirm
		{
			margin: 2% 5% 20% 5%;
		}
		table th
		{
			color: orangered;
		}
		.btn
		{
			float: right;
		}
	</style>
	<body>
		<ol class="breadcrumb">
		  <li><a href="../../index.php">首页</a></li>
		  <li><a href="javascript:history.back();">商品详情</a></li>
		  <li class="active">提交订单</li>
		</ol>
		<div class="confirm table-responsive">
		<table class="table">
			<caption>确认订单</caption>
		   <thead>
		      <tr>
		         <th>商品名称</th>
		         <th>数量</th>
		         <th>价格</th>
		         <th>收货人</th>
		         <th>收货地址</th>
		         <th>电话</th>
		      </tr>
		   </thead>
		   <tbody>
		      <tr>
		         <td><?php echo $row['name'];?></td>
		         <td><?php echo $num;?></td>
		         <td><?php echo $row['price']*$num;?></td>
		         <td><?php echo $row1['name'];?></td>
		         <td><?php echo $row1['address'];?></td>
		         <td><?php echo $row1['tel']?></td>
		      </tr>
		   </tbody>
		</table>
		<button type="button"class="btn btn-danger">提交订单</button>
		</div>
		<?php include("../public/foot.php");?>
	</body>
</html>
