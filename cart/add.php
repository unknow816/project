<?php 
	ob_start();
	require_once "../common/common.php";
	require_once "../common/function.php";


	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:'.$siteUrl);
		die;
	}

	$result = getdata_by_id($id,'products');

	if(isset($_GET['num'])){
		if($_GET['num'] <= 0){
			$_GET['num'] = 1;
		}
	}


	if($result == null){
		echo "<h1>Product is null.</h1>";
	}
	$mang = [];
	if(!isset($_SESSION['cart'])){
		if(isset($_GET['num']) > 0){
			$result['quantity'] += $_GET['num'];
			array_push($mang, $result);
			echo "<h2>Session cap nhat theo num</h2>";
		}else{
			$result['quantity'] = 1;
			array_push($mang, $result);
			echo "<h2>Session moi tao</h2>";
		}
	}else{
		$mang = $_SESSION['cart'];
		$index = -1;
		// lap for de kiem tra su ton tai bang cach lap vonf for
		for ($i=0; $i < count($mang); $i++) { 
			if($mang[$i]['id'] == $id){
				$index = $i;
				break;
			}
		}

		if($index >= 0){
			if(isset($_GET['num'])){
				$mang[$index]['quantity'] += $_GET['num'];
			}else{
				$mang[$index]['quantity'] += 1; 
			}
			
		}else{
			if(isset($_GET['num']) > 0){
				$result['quantity'] += $_GET['num'];
				array_push($mang, $result);
			}else{
				$result['quantity'] = 1;
				array_push($mang, $result);
			}
		}


	}




	$_SESSION['cart'] = $mang;
	var_dump($_SESSION['cart']);

	header('Location:'.$siteUrl.'cart');
	ob_end_flush();
 ?>
