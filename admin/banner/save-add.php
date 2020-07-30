<?php 

	$path = '../';

	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST' ){
		header('location:'.$adminUrl.'banner');
		die;
	}


	$detail = $_POST['detail'];
	$status = $_POST['status'];
	$image = $_FILES['image'];

	$erro = 0;

	if(strlen($image['name']) == 0){
		$erro = 1;
		$imageerror = "Hay chon anh";
	}


	if($status == ''){
		$erro = 1;
		$statuserror = "Hay chon trang thai";
	}

	if($erro == 1){
		header('location:'.$adminUrl.'banner/add.php?imageerror='.$imageerror.'&statuserror='.$statuserror);
		die;
	}

	if($image['size'] > 0){
		$filename = 'images/brand/'. uniqid() . "-" . $image['name'];
		//move_uploaded_file($image['tmp_name'], '../../'.$filename);
	}

	$sql = "insert into banner(

							image,
							detail,
							status
							)values(

							'$filename',
							'$detail',
							$status) ";


	$stmt = $conn->prepare($sql);
	$stmt->execute();
	//echo $sql;

 ?>
 <h2>ADD Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>banner?success=true";
 	},1500);
 </script>