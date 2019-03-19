<?php
	//连接数据库
    include("public/common/config.php");
//  顶部导航栏引入
    include("home/public/top.php");
//	查询广告表
	$sql1="SELECT * FROM banner where state='1' ORDER BY id";
	$result1=$db->query($sql1);
//	查询分类表
	$sql2="select * from class where state='1' order by id";
	$result2=$db->query($sql2);
//	查询商品表
	$sql3="select * from goods where state='1' order by id";
	$result3=$db->query($sql3);
	$goodslist=[];
	while($goods=$result3->fetch_array())
	{
		$goodslist[]=$goods;
	}
?>
<!DCOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>女儿国</title>
    <link rel="stylesheet" href="home/ui/css/bootstrap.css">
    <link rel="stylesheet" href="home/public/css/shutter.css" /><!--轮播图样式-->
    <script src="home/ui/js/bootstrap.js"></script>
    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
           <!--轮播图js-->
    <script src="home/public/js/shutter.js"></script>
    <script src="home/public/js/velocity.js"></script>
    <!--引入图标-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
     .navbartop
     {
     	margin: 0;
     	padding: 0;
     }
     .goods-list
     {
  /*   	display: block;*/
     	width: 100%;
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

    </style>
</head>
<body>



<!--banner轮播图-->
<div class="shutter"style="margin-top:51px;">
	<div class="shutter-img">
		<?php
//			循环遍历轮播图片
			while($banner=$result1->fetch_array())
			{
        ?>
		  <a href="<?php echo $banner['address'];?>" data-shutter-title="<?php echo $banner['text'];?>"><img class="img-responsive" src="home/public/getbanner.php?id=<?php echo $banner['id'];?>"/></a>
		  <!--文字加载区-->
		  <div class="shutter-desc">
			<p>欢迎来到女儿国！</p>
	      </div>
		<?php } ?>
	</div>
	<ul class="shutter-btn">
		  <li class="prev"></li>
		  <li class="next"></li>
	</ul>
</div>


<!--商品导航栏-->
    <div class=" container-fluid"style="background-color: orangered;width: 100%;margin: 0;
     	padding: 0;">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"style="color: #FFFFFF;">商品分类</a>
            <?php while($class=$result2->fetch_array())
					{
            ?>
            <a class="navbar-brand" href="home/class/class.php?class_id=<?php echo $class['id'];?>"style="color: #FFFFFF;font-size: 16px;"><?php echo $class['name'];?></a>
            <?php } ?>
        </div>
    </div>
<!--</nav>-->
<!--商品列表-->
<div class="goods-list container">
	<div class="row">
		<?php foreach($goodslist as $goods){?>
			<a href="home/goods/goods.php?id=<?php echo $goods['id']?>">
			<div class="goods col-md-2">
				<div class="goodsimage">
					<img src="<?php echo $goods['imagesrc']?>"/>
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
</div>
 <!--底部栏引入-->
<?php include("home/public/foot.php");?>
<script>
    $(function () {
	  $('.shutter').shutter({
//		shutterH:100 , // 容器高度
		isAutoPlay: true, // 是否自动播放
		playInterval: 5000, // 自动播放时间
		fullPage:false // 是否全屏展示
	  });
});
</script>
</body>
</html>