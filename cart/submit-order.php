<?php 

	require_once '../common/common.php';
	require_once '../common/function.php';

	$sessionValue = isset($_SESSION['cart']) == true ? $_SESSION['cart'] : "";

	// if($_SERVER['REQUEST_METHOD'] != 'POST'){
	// 	header('localhost:'.$siteUrl.'cart');
	// 	die;
	// }
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';


	if(strlen($name) == 0){
		$erro = 1;
		$_SESSION['nameerror'] = "Hãy nhập tên";
	} elseif (strlen($name) > 50) {
		$erro = 1;
		$_SESSION['nameerror'] = "Không nhập quá 50 ký tự";
	}else{
		$_SESSION['nameerror'] = "";
	}

	if($email == ''){
		$erro = 1;
		$_SESSION['emailerror'] = "Hãy nhập email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$_SESSION['emailerror'] = "Nhập đúng định dạng email vd:ten08@gmail.com";
	}else{
		$_SESSION['emailerror'] = "";
	}


	if(strlen($phone) == 0){
		$erro = 1;
		$_SESSION['phoneerror'] = "Hay nhap so dien thoai";
	}else if (!is_numeric($phone)) {
		$erro = 1;
		$_SESSION['phoneerror'] = "Hay nhap chu so";
	}elseif (strlen($phone) < 9 || strlen($phone) > 11) {
		$erro = 1;
		$_SESSION['phoneerror'] = "Nhap toi thieu 10 chu so";
	}else{
		$_SESSION['phoneerror'] = "";
	}


	if(strlen($address) == 0){
		$erro = 1;
		$_SESSION['addresserror'] = "Hãy nhập nội dung";
	}else{
		$_SESSION['addresserror'] = "";
	}



	if($erro == 1){
		header('location:'.$siteUrl.'cart');
		die;
	}


	$order_id = addorder('orders',$_POST);


	foreach ($sessionValue as $value) {
		$sql = "insert into order_detail (order_id,pro_id,quantity,price) values("
		.$order_id.",".
		$value['id'].",".

		$value['quantity'].",".
		$value['price'].')';

		$stmt = $conn->prepare($sql);
		$stmt->execute();

		
	}





	// header('localhost:index.php');
		
		setcookie('tsuccess', 'true', time() + 2, "/");
		unset($_SESSION['cart']);


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once '../_share/client.php'; ?>
</head><!--/head-->
<body class="text-center" >

  	<h2 style="margin: 350px 0;">Loading .....</h2>
	
</body>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $siteUrl ?>shop.php";
  },1500);
 </script>
</html>
