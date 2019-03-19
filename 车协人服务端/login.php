<?php
	include("config.php");
	$studentnumber=$_POST['studentnumber'];
	$password=md5($_POST['password']);
	$sql="SELECT * FROM user";
	$result=$db->query($sql);
	while($row=$result->fetch_array())
	{
		if($studentnumber==$row['studentnumber'])
		{
			if($password==$row['password'])
			{
				echo json_encode($row);
			}
		}
	}
?>