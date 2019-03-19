<?php
		include("../config.php");
		include("public/safe.php");
		$id=$_SESSION['id'];
		$sql="SELECT * FROM zucheadmin WHERE id='$id'";
		$row=$db->query($sql)->fetch_array();
		$name=$row['name'];
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>车协人租车管理</title>
  
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
            <li class="layui-nav-item lfnav">
                <a href="bycycle/showbycycle.php"target="frame-body"><span >自行车管理</span></a>
            </li>
             <li class="layui-nav-item lfnav">
                <a href="order/showorder.php"target="frame-body"><span >租车管理</span></a>
            </li>
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