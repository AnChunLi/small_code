<?php
	$db=new mysqli("182.254.227.198","root","LACIT1314","nverguo");
    if($db->connect_errno<>0){
        echo"error";
    }
	$db->query("SET NAMES UTF8");
?>