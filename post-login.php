<?php

	require_once './common/common.php';
	require_once './common/function.php';	


	$email = $_POST['email'];
	$password = $_POST['password'];

	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';

	if($email == ''){
		$erro = 1;
		$_SESSION['emailerror'] = "Hãy nhập email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$_SESSION['emailerror'] = "Nhập đúng định dạng email vd:ten08@gmail.com";
	}else{
		$_SESSION['emailerror'] = "";
	}

	if($password == ""){
		$erro = 1;
		$_SESSION['passworderror'] = "Hãy nhập mật khẩu";
	}elseif (strlen($password) < 6) {
		$erro = 1;
		$_SESSION['passworderror'] = "Hãy nhập mật khẩu dài hơn 6 ký tự";
	}else{
		$_SESSION['passworderror'] = "";
	}

	if($erro == 1){
		header('location:'.$siteUrl.'login.php');
		die;
	
	}

	$sql = "select * from users where email = '$email' AND status = 0";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkuser = $stmt->fetch();

	if($checkuser == true){
		if(password_verify($password, $checkuser['password'])){
			$_SESSION['cuser'] = $checkuser;
		}else{
			$erro = 2;
			$_SESSION['passworderror'] = "Nhập sai mật khẩu";
		}
	}else{
		$erro = 2;
		$_SESSION['emailerror'] = "Email không tồn tại";
	}

	if($erro == 2){
		header('location:'.$siteUrl.'login.php');
		die;
	}
	sleep(1.5);
    header('location:'.$siteUrl);


 ?>