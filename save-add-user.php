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
	}elseif ($checkemail == true) {
		$erro = 1;
		$_SESSION['emailerror'] = "Email đã tồn tại";
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
		header('location:'.$siteUrl.'register.php');
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

    setcookie('asuccess','true',time() + 2,"/");

    //header('location:'.$siteUrl.'login.php');


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
    window.location.href = "<?= $siteUrl ?>login.php";
  },1500);
 </script>
</html>