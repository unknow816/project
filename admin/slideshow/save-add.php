<?php 

	$path = '../';

	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST' ){
		header('location:'.$adminUrl.'banner');
		die;
	}

	$name = $_POST['name'];
	$detail = $_POST['detail'];
	$order_num = $_POST['order_num'];
	$status = $_POST['status'];
	$image = $_FILES['image'];

	$erro = 0;
	$filename= "";

	if(strlen($name) == 0){
		$erro = 1;
		$nameerror = "Hay nhap ten";
	} elseif (strlen($name) > 50) {
		$erro = 1;
		$nameerror = "Khong nhap qua 150 ky tu";
	}

	if(strlen($detail) == 0){
		$erro = 1;
		$detailerror = "Hay nhap mo ta";
	}


	if(strlen($image['name']) == 0){
		$erro = 1;
		$imageerror = "Hay chon anh";
	}


	if(strlen($order_num) == 0){
		$erro = 1;
		$order_numerror = "Hay nhap so thu tu slide";
	}elseif (!is_numeric($order_num)) {
		$erro = 1;
		$order_numerror = "Hay nhap chu so";
	}

	if($status == ''){
		$erro = 1;
		$statuserror = "Hay chon trang thai";
	}

	if($erro == 1){
		header('location:'.$adminUrl.'slideshow/add.php?nameerror='.$nameerror.'&imageerror='.$imageerror.'&detailerror='.$detailerror.'&order_numerror='.$order_numerror.'&statuserror='.$statuserror);
		die;
	}

	if($image['size'] > 0){
		$filename = 'images/slideshow/'. uniqid() . "-" . $image['name'];
		move_uploaded_file($image['tmp_name'], '../../'.$filename);
	}

	$sql = "insert into slideshows(
							name,
							image,

							detail,
							order_num,
							status)values(

							'$name',
							'$filename',
							'$detail',

							$order_num,
							$status) ";


	$stmt = $conn->prepare($sql);
	$stmt->execute();
	// echo $sql;

 ?>
 <h2>ADD Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>slideshow?success=true";
 	},1500);
 </script>