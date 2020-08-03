<?php

	require_once './common/common.php';
	require_once './common/function.php';	

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';
	$checkemail = check('users','email',$email);

	if(strlen($name) == 0){
		$erro = 1;
		$nameerror = "Hãy nhập tên";
	} elseif (strlen($name) > 50) {
		$erro = 1;
		$nameerror = "Không nhập quá 50 ký tự";
	}

	if($email == ''){
		$erro = 1;
		$emailerror = "Hãy nhập email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$emailerror = "Nhập đúng định dạng email vd:ten08@gmail.com";
	}elseif ($checkemail == true) {
		$erro = 1;
		$emailerror = "Email đã tồn tại";
	}

	if($password == ""){
		$erro = 1;
		$passworderror = "Hãy nhập mật khẩu";
	}elseif (strlen($password) < 6) {
		$erro = 1;
		$passworderror = "Hãy nhập mật khẩu dài hơn 6 ký tự";
	}

	if($erro == 1){
		header('location:'.$siteUrl.'register.php?nameerror='.$nameerror.'&emailerror='.$emailerror.'&passworderror='.$passworderror);
		die;
	
	}

	$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

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

	$sql = "insert into users ($cols)";
	$sql .= " values($vals)";
	// echo $sql;
	$stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location:'.$siteUrl.'login.php');


 ?>