<?php
	$db=new mysqli("localhost","root","LACIT1314","nverguo");
    if($db->connect_errno<>0){
        echo"error";
    }
	$db->query("SET NAMES UTF8");
?>