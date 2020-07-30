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
		$nameerror = "Hay Nhap ten";
	} elseif (strlen($name) > 100) {
		$erro = 1;
		$nameerror = "Khong nhap qua 100 ky tu";
	}

	$sql = "select * from brands where name = '$name'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$test = $stmt->fetch();

	if($test == true){
		$erro = 1;
		$nameerror = "Ten da ton tai";
	}



	if(strlen($detail) == 0){
		$erro = 1;
		$detailerror = "Hay nhap mo ta";
	}

	if(strlen($image['name']) == 0){
		$erro = 1;
		$imageerror = "Hay chon anh";
	}


	if($erro == 1){
		header('location:'.$adminUrl.'brand/add.php?nameerror='.$nameerror.'&detailerror='.$detailerror.'&imageerror='.$imageerror);
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

 ?>
 <h2>ADD Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>brand?success=true";
 	},1500);
 </script>