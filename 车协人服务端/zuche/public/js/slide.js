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