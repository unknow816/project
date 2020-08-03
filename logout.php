<?php 
	session_start();
	session_destroy();

	require_once './common/common.php';
	sleep(1);	
	header('location:'.$siteUrl.'login.php');

 ?>