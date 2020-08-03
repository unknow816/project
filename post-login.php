<?php

	require_once './common/common.php';
	require_once './common/function.php';	


	$email = $_POST['email'];
	$password = $_POST['password'];

	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';

	if($email == ''){
		$erro = 1;
		$emailerror = "Hãy nhập email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$emailerror = "Nhập đúng định dạng email vd:ten08@gmail.com";
	}

	if($password == ""){
		$erro = 1;
		$passworderror = "Hãy nhập mật khẩu";
	}elseif (strlen($password) < 6) {
		$erro = 1;
		$passworderror = "Hãy nhập mật khẩu dài hơn 6 ký tự";
	}

	if($erro == 1){
		header('location:'.$siteUrl.'login.php?emailerror='.$emailerror.'&passworderror='.$passworderror);
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
			$passworderror = "Nhập sai mật khẩu";
		}
	}else{
		$erro = 2;
		$emailerror = "Email không tồn tại";
	}

	if($erro == 2){
		header('location:'.$siteUrl.'login.php?emailerror='.$emailerror.'&passworderror='.$passworderror);
		die;
	
	}
	sleep(1.5);
    header('location:'.$siteUrl);


 ?>