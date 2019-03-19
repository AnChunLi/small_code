<?php
	$db=new mysqli("localhost","root","LACIT1314","chexieren");
    if($db->connect_errno<>0){
        echo"error";
    }
	$db->query("SET NAMES utf8mb4");
?>