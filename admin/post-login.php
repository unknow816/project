<?php 
	$path = "";

	require_once '../common/common.php';
	require_once '../common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location:'.$adminUrl.'login.php');
		die;
	}

	$email = $_POST['email'];
	$password = $_POST['password'];

	$error = 0;


	$sql = "select * from users where email = '$email' AND role >= 1 AND status = 0";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkuser = $stmt->fetch();

	if($checkuser == true){
		if(password_verify($password, $checkuser['password'])){
			$_SESSION['user'] = $checkuser;

		}else{
			$error = 1;
			$passworderror = "Mat khau sai";
		}

	}else{
		$error = 1;
		$checkusererror = "Email khong ton tai";
	}

	if($error == 1){
		header('location:'.$adminUrl.'login.php?checkusererror='.$checkusererror.'&passworderror='.$passworderror);
		die;
	}

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
    window.location.href = "<?= $adminUrl ?>";
  },1500);
 </script>
</html>