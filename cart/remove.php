<?php 

	require_once '../common/common.php';
	require_once '../common/function.php';

	//if($_SERVER['REQUSET_METHOD'] !='GET')
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:'.$siteUrl."cart/");
	}

	$mang = [];

	$mang = $_SESSION['cart'];

	$index = -1;
	for ($i=0; $i < count($mang); $i++) { 
		if($mang[$i]['id'] == $id){
			$index = $i;
			break;
		}
	}

	if($index >= 0){
		$mang[$index]['quantity'] -= 1;	
		if($mang[$index]['quantity'] < 1){
			array_splice($mang, $index, 1);
		}		
	}


	$_SESSION['cart'] = $mang;

	// var_dump($_SESSION['cart']);


	header('Location:../cart');


 ?>