<?php
	include("../../public/common/config.php");
	//  顶部导航栏引入
    include("../public/top.php");
	$key=$_POST['key'];
	$sql="select * from goods where name like'%$key%' and state='1' order by id desc";
	$result=$db->query($sql);
	$goodslist=[];
	$num=0;
	while($goods=$result->fetch_array())
	{
		$goodslist[]=$goods;
		$num++;
	}
?>
<!DCOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>搜索商品</title>
    <link rel="stylesheet" href="../ui/css/bootstrap.css">
    <script src="../ui/js/bootstrap.js"></script>
    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!--引入图标-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
    	 body
    	 {
    	 	margin-top: 51px;
    	 }
	     .goods-list
	     {
	     	width: 100%;
	     	margin: 3% 0;
	     }
	     .goods
	     {
	        width: 250px;
	        height: 280px;
	     	margin: 0.5% 9.8px;
	     	border: solid #888 1px;
	     	border-radius: 5px;
	     	padding: 0;
	     }
	     .goods:hover
	     {
	     	border: solid orangered 2px;
	     }
	     .goodsimage
	     {
	     margin: 9.5px;
	     padding: 0;
	     }
	     .goodsimage img
	     {
	     	width: 230px;
	     	height: 200px;
	     	border-radius: 5px;
	     }
	     .goodsname
	     {
	     margin: 1px 9.5px;
	     }
	     .goodsprice
	     {
	     	color: orangered;
	     	font-weight: 2px;
	     	margin: 1px 9.5px;
	     }
	     .sales
	     {
	     	float: right;
	     	color: #888;
	     }
	     .nosearch
	     {
	     	margin: 10% 40%;
			color: #888;
	     }
    </style>
</head>
<body>
	<ol class="breadcrumb">
	  <li><a href="../../index.php">首页</a></li>
	  <li class="active">搜索"<?php echo $key;?>"</li>
	</ol>
	<!--商品列表-->
	<div class="goods-list container">
		<?php if($num==0):?>
		<div class="nosearch"><h3>没有你想找的宝贝哦！</h3></div>
		<?php else:?>
		<div class="row">
			<?php foreach($goodslist as $goods){?>
				<a href="../goods/goods.php?id=<?php echo $goods['id']?>">
				<div class="goods col-md-2">
					<div class="goodsimage">
						<img src="<?php echo $goods['imagesrc'];?>"/>
					</div>
					<div class="goodsname"><?php echo $goods['name']?></div>
					<div class="goodsprice">
						<strong>￥<?php echo $goods['price']?></strong>
						<div class="sales">销量:<?php echo $goods['sales']?></div>
					</div>
				</div>
				</a>
			<?php } ?>
		</div>
		<?php endif;?>
	</div>
	 <!--底部栏引入-->
	<?php include("../public/foot.php");?>
</body>
</html>