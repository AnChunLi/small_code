<?php
		include("../config.php");
		include("public/safe.php");
		$id=$_SESSION['id'];
		$sql="SELECT * FROM adminuser WHERE id='$id'";
		$row=$db->query($sql)->fetch_array();
		$name=$row[3];
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>车协人后台管理</title>
  
  <link rel="stylesheet" href="public/layui/css/layui.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="public/css/admin.css" />
  
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
	   <!-- 头部区域（可配合layui已有的水平导航） -->
  <div class="layui-header">
    <a href="menu.php"target="_self"><div class="layui-logo">武大车协</div></a>
 <!--顶部导航栏左侧内容-->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="adminuser/adminuser.php"target="frame-body">管理员设置</a></li>
    </ul>
    <!--顶部导航栏右侧内容-->
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <?php echo $name;?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="public/updatepwd.html"target="frame-body">修改密码</a></dd>
          <dd><a href="public/loginout.php">退出系统</a></dd>
        </dl>
      </li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item lfnav ">
                <a class="" href="javascript:;"><span >会员管理</span></a>
                <dl class="layui-nav-child">
                	<dd><a href="user/noshenheuser.php"target="frame-body"><span >未审核</span></a></dd>
                    <dd><a href="user/user.php"target="frame-body"><span >会员列表</span></a></dd>
                </dl>
            </li>
            <li class="layui-nav-item lfnav">
                <a href="javascript:;"></i> <span >活动管理</span></a>
                <dl class="layui-nav-child">
                	<dd><a href="training/addtraining.php"target="frame-body"><span >添加活动</span></a></dd>
                    <dd><a href="training/traininglist.php"target="frame-body"><span >活动列表</span></a></dd>
                </dl>
            </li>
            <li class="layui-nav-item lfnav">
                <a href="javascript:;"><span >预约管理</span></a>
                <dl class="layui-nav-child">
                	<dd><a href="order/nofinishorder.php"target="frame-body"><span >待处理</span></a></dd>
                    <dd><a href="order/orderlist.php"target="frame-body"><span >已处理</span></a></dd>
                </dl>
            </li>
            <!--<li class="layui-nav-item lfnav">
                <a href="release/release.php"target="frame-body"><span >动态管理</span></a>
            </li>-->
            <li class="layui-nav-item lfnav">
                <a href="banner/showbanner.php"target="frame-body"><span >轮播图管理</span></a>
            </li>     
            <li class="layui-nav-item lfnav">
                <a href="map/showmap.php"target="frame-body"><span >地图管理</span></a>
            </li>
            <li class="layui-nav-item lfnav">
                <a href="tuozhan/tuozhan.php"target="frame-body"><span >拓展信息</span></a>
            </li>
            <li class="layui-nav-item lfnav">
                <a href="zucheadmin/adminuser.php"target="frame-body"><span >租车系统管理员</span></a>
            </li>
            <!--<li class="layui-nav-item lfnav">
                <a href="form/form.php"target="frame-body"><span >问卷管理</span></a>
            </li>         -->
        </ul>
        
        <div class="fa-copyright1"title="由李安春于2018年开发">© 2018 武大车协</div>
        
    </div>
    
    
  </div>

    
  <div class="layui-body">
  	<div class="layui-bg-black kit-side-fold">
    <!-- 关闭按钮 -->
       <i class="fa fa-caret-left lefticon" aria-hidden="true"></i>
  </div>

  	<iframe name="frame-body"src="right.php"frameborder="0" ></iframe>
  
  </div>
</div>

<!--layui.js引入-->
<script src="public/layui/layui.all.js"></script>
<!--负责左侧导航栏伸缩-->
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    var isShow = true;  //定义一个标志位
    $('.kit-side-fold').click(function(){
        //选择出所有的span，并判断是不是hidden
        $('.lfnav span').each(function(){
            if($(this).is(':hidden')){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
        //判断isshow的状态
        if(isShow){
            $('.layui-side.layui-bg-black').width(0); //设置宽度
            $('.kit-side-fold').css('margin-left', '0'); //修改图标的位置
            $('.kit-side-fold i').css('transform','rotateY(180deg)');
            //将footer和body的宽度修改
            $('.layui-body').css('left', 0+'px');
            $('.layui-footer').css('left', 0+'px');
            //将二级导航栏隐藏
            $('dd span').each(function(){
                $(this).hide();
            });
            //修改标志位
            isShow =false;
        }else{
            $('.layui-side.layui-bg-black').width(200);
            $('.kit-side-fold').css('margin-top', '18%');
            $('.kit-side-fold').css('margin-left', '0');
            $('.kit-side-fold i').css('transform','rotateY(0deg)');
            $('.layui-body').css('left', 200+'px');
            $('.layui-footer').css('left', 200+'px');
            $('dd span').each(function(){
                $(this).show();
            });
            isShow =true;
        }
    });

</script>

</body>
</html>