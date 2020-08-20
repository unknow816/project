<?php 

	require_once '../../common/common.php';
	require_once '../../common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location:'.$adminUrl.'category');
		die;
	}

	$name = $_POST['name'];
	$detail = $_POST['detail'];



	$error = 1;
	$nameerro = "";

	if(strlen($name) == 0){
		$error = 0;
		$_SESSION['nameerror'] = "Hay nhap ten";
	}elseif(strlen($name) > 50){
		$error = 0;
		$_SESSION['nameerror'] = "Khong nhap qua 50 ky tu";
	}else{
		$_SESSION['nameerror'] = "";
	}


	$sql = "select * from categories where name = :name ";
	$check = $conn->prepare($sql);
	$check->bindParam(":name", $name);
	$check->execute();
	$test = $check->fetch();

	if($test){

		$error = 0;
		$_SESSION['nameerror'] = "Ten da ton tai";

	}

	if($error == 0){

		header('location:'.$adminUrl.'category/add.php');
		die;

	}
	
		$sql = "insert into categories (name,detail) values (:name, :detail)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":detail", $detail);
		$stmt->execute();
		//header('location:'.$adminUrl.'category?succes=true');
		setcookie('success', 'true', time() + 2, "/");


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once '../../_share/client.php'; ?>
</head><!--/head-->
<body class="text-center" >

    <h2 style="margin: 350px 0;">Loading .....</h2>
  
</body>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>category";
  },1500);
 </script>
</html>