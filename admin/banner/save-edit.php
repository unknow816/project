<?php 

	$path = '../';

	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST' ){
		header('location:'.$adminUrl.'banner');
		die;
	}

	$id = $_POST['id'];
	$detail = $_POST['detail'];
	$status = $_POST['status'];
	$image = $_FILES['image'];

	$erro = 0;
	$filename = "";

	if($status == ''){
		$erro = 1;
		$statuserror = "Hay chon trang thai";
	}

	if($erro == 1){
		header('location:'.$adminUrl.'banner/edit.php?id='.$id.'&statuserror='.$statuserror);
		die;
	}


	$sql = "update banner set detail = '$detail',
							  status = $status";


	if($image['size'] > 0){
		$filename = 'images/banner/update/'. uniqid() . "-" . $image['name'];
		move_uploaded_file($image['tmp_name'], '../../'.$filename);
		$sql .= ", image = '$filename'";
	}

	$sql .= " where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	// echo $sql;
	// die;
 ?>
 <h2>Edit Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>banner?esuccess=true";
 	},1500);
 </script>