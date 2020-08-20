<?php 

	require_once '../common/common.php';
	require_once '../common/function.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location:'.$siteUrl.'account.php');
		die;
	}

	$mang = [];
	$cols = "";
	$vals = "";
	$total = "";
	$index = 0;
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$avatar = $_FILES['avatar'];
	$filename = "";

	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';

	if($email == ''){
		$erro = 1;
		$_SESSION['emailerror'] = "hãy nhập email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$_SESSION['emailerror'] = "Nhập đúng định dạng email vd:ten08@gmail.com";
	}else{
		$_SESSION['emailerror'] = "";
	}

	if($erro == 1){
		header('location:'.$siteUrl.'account.php?request=edit');
		die;
	}
	//ar_dump($_POST);
	foreach ($_POST as $key => $value) {
		if($key != 'password' and $key != 'id'){
			$total .= $key ."= '".$value."',";
		}
		
	}
	$total = rtrim($total, ", ");
	$sql = "update users set $total";


	if(strlen($password) > 0){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql .= ", password = '$password'";
	}


	if($avatar['size'] > 0){
		$filename = 'images/user/update/' . uniqid() . "-" . $avatar['name'];
		move_uploaded_file($avatar['tmp_name'], '../'.$filename);
		$sql .= ", avatar = '$filename'";
	}

	$sql .= " where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	setcookie('esuccess','true',time() + 3,"/");

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
    window.location.href = "<?= $siteUrl ?>account.php";
  },1500);
 </script>
</html>