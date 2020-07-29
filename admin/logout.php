<?php 
	session_start();
	session_destroy();

	$path = "";

	require_once '../common/common.php';
	sleep(2);	
	header('location:'.$adminUrl.'login.php');

 ?>