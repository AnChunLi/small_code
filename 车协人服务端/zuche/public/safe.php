<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		echo "<script>parent.location.href='../index.php';</script>";
	}
?>