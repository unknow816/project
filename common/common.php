<?php 


	$localhost = "localhost";
	$dbname = "project1";
	$username = "root";
	$password = "";

	try {

		$conn = new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8", $username, $password);

	} catch (PDOException $e) {
		echo 'Connect failed : ' . $e->getMessage();
	}


	session_start();

	$siteUrl = "http://localhost/project/";

	$adminUrl = "http://localhost/project/admin/";

	$adminAsset = "http://localhost/project/admin/adminlte/";

 ?>