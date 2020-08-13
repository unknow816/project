<?php 

	require_once '../common/common.php';
	require_once '../common/function.php';

	//if($_SERVER['REQUSET_METHOD'] !='GET')
	if(isset($_GET['id']) and isset($_GET['num'])){
		$id = $_GET['id'];
		$num = $_GET['num'];
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
		if($num >= 1){
			$mang[$index]['quantity'] = $num;
		}else{
			array_splice($mang, $index, 1);
		}
	}


	$_SESSION['cart'] = $mang;

	// var_dump($_SESSION['cart']);


	header('Location:../cart');
 ?>