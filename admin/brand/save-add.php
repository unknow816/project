<?php 

	$path = '../';

	require_once $path.$path.'common/common.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST' ){
		header('location:'.$adminUrl.'brand');
		die;
	}


	$name = $_POST['name'];
	$detail = $_POST['detail'];
	$image = $_FILES['image'];

	$erro = 0;

	if(strlen($name) == 0){
		$erro = 1;
		$_SESSION['nameerror'] = "Hay Nhap ten";
	} elseif (strlen($name) > 100) {
		$erro = 1;
		$_SESSION['nameerror'] = "Khong nhap qua 100 ky tu";
	}else{
		$_SESSION['nameerror'] = "";
	}

	$sql = "select * from brands where name = '$name'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$test = $stmt->fetch();

	if($test == true){
		$erro = 1;
		$_SESSION['nameerror'] = "Ten da ton tai";
	}



	if(strlen($detail) == 0){
		$erro = 1;
		$_SESSION['detailerror'] = "Hay nhap mo ta";
	}else{
		$_SESSION['detailerror'] = "";
	}

	if(strlen($image['name']) == 0){
		$erro = 1;
		$_SESSION['imageerror'] = "Hay chon anh";
	}else{
		$_SESSION['imageerror'] = "";
	}


	if($erro == 1){
		header('location:'.$adminUrl.'brand/add.php');
		die;
	}

	if($image['size'] > 0){
		$filename = 'images/brand/'. uniqid() . "-" . $image['name'];
		move_uploaded_file($image['tmp_name'], '../../'.$filename);
	}

	$sql = "insert into brands(

							name,
							detail,
							image)values(

							'$name',
							'$detail',
							'$filename') ";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	setcookie('success', 'true', time() + 2, "/");


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once '../../_share/client.php'; ?>
</head><!--/head-->
<body class="text-center" >

    <h2 style="margin: 350px 0;">Loading .....</h2>
  
</body>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>brand";
  },1500);
 </script>
</html>