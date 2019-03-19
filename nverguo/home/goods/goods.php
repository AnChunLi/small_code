<?php
//连接数据库
	include("../../public/common/config.php");
//  顶部导航栏引入
    include("../public/top.php");
	$id=$_GET['id'];
	$sql="select * from goods where id='$id'";
	$row=$db->query($sql)->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../ui/css/bootstrap.css">
		<script src="../ui/js/jquery-1.12.4.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style>
			body
			{
			margin-top: 51px;
			}
			.goodsimg
			{
				width: 420px;
				height: 420px;
				margin: 5% 0 5% 20%;
			}
			.goodsimg img
			{
				width: 418px;
				height: 418px;
			}
			.form
			{
				margin: 5% 5%;
			}
			.form div
			{
				margin: 5% 0;
			}
			.name
			{
				font-weight:bolder;
				font-size: 20px;
			}
			.price strong
			{
				color: orangered;
				font-size: 25px;
			}
			.number
			{
				display: inline-flex;
			}
			.num input
			{
				width: 25px;
			}
			.num .amount-btn
			{
				width: 5px;
				display: inline-block;
				margin: 0 10px;
			}
			.specifications .specification
			{
				padding: 0;
			}
			.specifications .specification .shuxins
			{
				padding: 0;
				display: inline-table;
				margin: 0;
			}
			 label
			{
				color: #888888;
				margin-right: 10px;
				font-size: 15px;
			}
			hr
			{
				border: solid 1px orangered;
				width: 100%;
				margin: 0;
			}
			.tab-content
			{
				width: 80%;
				margin: 20px auto;
			}
			.nav-tabs
			{
				margin: 0 auto;
				width: 80%;
			}
			.comment
			{
				display: inline-flex;
				width: 100%;
				border-bottom: dashed 1px #888;
				padding: 15px 0;
			}
			.comment .username
			{
				color: orangered;
				font-size: 15px;
				font-weight: bolder;
				margin-right: 5px;
			}
		</style>
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="../../index.php">首页</a></li>
		  <li class="active">商品详情</li>
		</ol>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="goodsimg">
						<img src="<?php echo $row['imagesrc'];?>"/>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form">
						<form action="buy.php?id=<?php echo $id;?>"method="post">
							<div class="name"><?php echo $row['name'];?></div>
							<div class="price">
								<label>价格</label>
								<strong>￥<?php echo $row['price'];?></strong>
							</div>
							<div class="specifications">
								<label>规格</label>
								<div class="specification"> 
									<?php 
										$specificationid=$row['specification1'];
										$sql1="select * from specification where id='$specificationid'";
										$sql2="select * from specificationlist where classid='$specificationid' and state='1'";
										$result1=$db->query($sql1);
										$result2=$db->query($sql2);
										$row1=$result1->fetch_array();
									?>
									<div class="shuxins">
										<div ><?php echo $row1['name'];?></div>
											<select name="specification"class="form-control"style="margin-left: 10px;">
												<?php while($row2=$result2->fetch_array())
												{?>
												<option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option>
												<?php } ?>
											</select>
									</div>
								</div>
							</div>
							<div class="num">
								<label>数量</label>
								<div class="number">
									<input type="text"value="1"id="num"name="num" />
									<span class="amount-btn">
						                <span class="increase"id="increase"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
						                <span class="decrease"id="decrease"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
									</span>
								</div>
							</div>
							<button type="submit"class="btn btn-danger buy">立即购买</button>
						</form>
					</div>	
				</div>
			</div>
		</div>
		<hr />
		<!--商品详情-->
		<div class="container-fluid">
			<ul class="nav nav-tabs"id="myTab">
				<li class="active"><a href="#details">商品详情</a></li>
				<li><a href="#comment">商品评论</a></li>
			</ul>
			<div class="tab-content">
			  <div class="tab-pane active" id="details">
			  	<div class="details">
				<?php echo $row['details'];?>
				</div>
			  </div>
			  <div class="tab-pane" id="comment">
			  	<?php 
			  		$sqlcomment="select * from goodscomment where goods_id='$id' order by id desc";
					$resultcomment=$db->query($sqlcomment);
					while($comment=$resultcomment->fetch_array())
					{
						$userid=$comment['user_id'];
						$sqluser="select * from user where id='$userid'";
						$user=$db->query($sqluser)->fetch_array();
			  	?>
			  		<div class="comment">
			  			<div class="username"><img class="img-circle"src="<?php echo $user['headsrc'];?>" style="width: 20px;height: 20px;"/>&nbsp;<?php echo $user['name'];?></div>:<?php echo $comment['text'];?>
			  		</div>
			  	<?php } ?>
			  </div>
			</div>
			
		</div>
		 <!--底部栏引入-->
		<?php include("../public/foot.php");?>
		<script>
		    $(document).ready(function(){
		    	$('#increase').click(function(){
				var num=$('#num').val();
				num++;
				$('#num').val(num);
				});
				$('#decrease').click(function(){
					var num=$('#num').val();
					num--;
					$('#num').val(num);
				});
		    });
		    $(function () {
			    $('#myTab a:first').tab('show');
			  })
			  $('#myTab a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			})
			
		</script>
	</body>
</html>
