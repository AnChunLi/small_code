<?php
	session_start();
	if(!isset($_SESSION['adminid']))
	{
		echo "<script>parent.location.href='../admin.html';</script>";
	}
?>