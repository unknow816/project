<?php 

	require_once './common/common.php';
	require_once './common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location:'.$siteUrl);
		die;
	}
	$pro_id = $_POST['pro_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	$created_at = $_POST['created_at'];

	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';

	if(strlen($name) == 0){
		$erro = 1;
		$nameerror = "Hãy nhập tên";
	} elseif (strlen($name) > 50) {
		$erro = 1;
		$nameerror = "Không nhập quá 50 ký tự";
	}

	if($email == ''){
		$erro = 1;
		$emailerror = "hãy nhập email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$emailerror = "Nhập đúng định dạng email vd:ten08@gmail.com";
	}

	if(strlen($content) == 0){
		$erro = 1;
		$contenterror = "Hãy nhập nội dung";
	}

	if($erro == 1){
		header('location:'.$siteUrl.'product-detail.php?id='.$pro_id.'&nameerror='.$nameerror.'&emailerror='.$emailerror.'&contenterror='.$contenterror);
		die;
	}


	$cols = "";
	$vals = "";
	$i = 0;
	foreach ($_POST as $key => $value) {
		if($i == 0){
			$cols .= $key;
			$vals .= "'".$value."'";
		}else{
			$cols .= ",".$key;
			$vals .= ",'".$value."'";
		};
		$i++;
	}

	$sql = "insert into comments ($cols)";
	$sql .= " values($vals)";
	$stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location:'.$siteUrl.'product-detail.php?id='.$pro_id);
 ?>