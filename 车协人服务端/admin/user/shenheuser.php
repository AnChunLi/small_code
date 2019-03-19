<?php
	include("../../config.php");
	include("../public/safe.php");
	$id=$_GET['id'];
	$level=$_POST['level'];
	$sql="update user set shenhe='1',level='$level' WHERE id='$id'";
	$is=$db->query($sql);
	if($is)
	{
		echo "<script>alert('审核通过！');location.href='user.php';</script>";
	}
//		$openid = $_POST["openid"];
//		$form_id = $_POST["formId"];
//		$json_token=http_request("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx9be8eac5125e8d42&secret=d22be8e34c977fa53a143f46eb6bb358");
//		$access_token=json_decode($json_token,true);
//		$access_token=$access_token['access_token'];
//		//echo $access_token;
//		//模板消息
//		$time =time();
//		$shoucangren = '张三';
//		$beizhu = '审核通过！';
//		$template=array(
//		        'touser'=>$openid,
//		        'form_id'=>$form_id,
//		        'template_id'=>"XXX",
//		        'data'=>array(
//		                'keyword1'=>array('value'=>urlencode($time),'color'=>'#FF0000'),
//		                'keyword2'=>array('value'=>urlencode($shoucangren),'color'=>'#FF0000'),
//		                'keyword3'=>array('value'=>urlencode($beizhu),'color'=>'#FF0000'),
//		                )
//		        );
//		$json_template=json_encode($template);
//		$url="https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=".$access_token;
//		$res=http_request($url,urldecode($json_template));
//		$json_obj = json_decode($res,true);
//		$json_obj['form_id'] = $form_id;
//		echo json_encode($json_obj);
//		 
//		 
//		function http_request($url,$data=array()){
//		    $ch = curl_init();
//		    curl_setopt($ch, CURLOPT_URL, $url);
//		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//		    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//		    // POST数据
//		    curl_setopt($ch, CURLOPT_POST, 1);
//		    // 把post的变量加上
//		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//		    $output = curl_exec($ch);
//		    curl_close($ch);
//		    return $output;
//		}
?>