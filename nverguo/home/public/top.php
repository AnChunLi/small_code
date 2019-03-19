<?php
////连接数据库
//	include("/public/common/config.php");
	session_start();
	//	查询导航栏表
	$sql="select * from navigation where state='1' ORDER BY id";
	$result=$db->query($sql);
?>
<!DCOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/home/ui/css/bootstrap.css">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="/home/public/js/bootstrap-hover-dropdown.min.js"></script>
    <!--表单验证插件引入-->
    <script src="https://cdn.bootcss.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <style>
    </style>
</head>   
<body>
<!--顶部导航栏-->
<nav class="navbar navbar-fixed-top navbar-default navbartop" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#navbar">
				<span class="sr-only">切换导航</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a href="#" class="navbar-brand ">未命名</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="mytab">
                <li ><a href="../../index.php">首页</a></li>
                <?php while($row=$result->fetch_array())
				{
                ?>
                <li><a href="<?php echo $row['address'];?>"><?php echo $row['navtitle'];?></a></li>
                <?php }?>
            </ul>

            <!--搜索框-->
            <form class="navbar-form navbar-left " role="search"action="/home/search/search.php"method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索你想要的找的宝贝"name="key"required="required">
                    <span class="input-group-btn" ><button type="submit"class="btn btn-default">GO</button></span>
                </div>
            </form>
            

            <ul class="nav navbar-nav navbar-right">
            	<?php if(!isset($_SESSION['id'])):?>
                <li><a href="/home/login/Login.html">登录</a></li>
                <li><a href="/home/register/Register.html">注册</a></li>
                <?php elseif(isset($_SESSION['id'])):
                		$id=$_SESSION['id'];
						$sql="select * from user where id='$id'";
						$row=$db->query($sql)->fetch_array();
						$name=$row['name'];
                ?>
                <li class="dropdown">
                	<a href="#"data-toggle="dropdown"class="dropdown-toggle" style="margin-right:30px;"data-hover="dropdown"data-delay="0" data-close-others="false">
                		<img class="img-circle" src="<?php echo $row['headsrc'];?>"style="width: 20px;height: 20px;"/>
                		<?php if(!$row['name']):?>
                			未设置
                		<?php else:?>
                		<?php echo $name;?>
                		<?php endif;?>
                		<span class="caret"></span>
                	</a>
                	<ul class="dropdown-menu">
					    <li><a href="/home/personalcenter/my.php">个人中心</a></li>
					    <li><a href="#">我的订单</a></li>
					    <li><a href="/home/community/myrelease.php">我的发布</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="#"data-toggle="modal" data-target="#updatepasswordModal">修改密码</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="/home/login/loginout.php">退出</a></li>
					</ul>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <!--头部导航栏结束-->  
</nav>
	<!--修改密码模态框-->
    <div class="modal fade" id="updatepasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	    	<form action="/home/personalcenter/updatepassword.php"method="post"id="updateform">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">修改密码</h4>
		            </div>
		            <div class="modal-body">
		            	<div class="form-group">
                            <input class="form-control"name="password"type="password"placeholder="请输入密码" style="margin: 15px 0;"/>  
                        </div>
                        <div class="form-group">
                            <input class="form-control"name="password1"type="password"placeholder="请确认密码" />
                        </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		                <button type="submit" class="btn btn-danger">提交更改</button>
		            </div>
		        </div><!-- /.modal-content -->
	        </form>
	    </div><!-- /.modal -->
	</div>
	<script>

	  // 验证表单的规则
        $('#updateform').bootstrapValidator({
            message: '输入的值无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

                
                password: {
                    validators: {
                        notEmpty: {
                            message: '请输入密码'
                        },
                        stringLength: {
                            min: 6,
                            max: 15,
                            message: '密码长度在 6-15 个字符之间'
                        }
                    }
                },
                password1: {
                    validators: {
                        notEmpty: {
                            message: '请确认密码'
                        },
                        identical: {
                            field: 'password',
                            message: '两次密码必须输入一致'
                        }
                    }
                }
            }
        });
	</script>

</body>
</html>