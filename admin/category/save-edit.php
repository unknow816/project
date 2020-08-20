<?php 

	require_once '../../common/common.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location:'.$adminUrl.'category');
		die;
	}

	$id = $_POST['id'];
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
	// chi tra ve 1 ket qua, var_dumo thi ket qua tra ve true hoac false
	$test = $check->fetch(); 

	// kiem tra xem ket qua co ton tai khong, var_dumo thi ket qua tra ve true
	if($test == true){

		// kiem tra id ten khong muon sua
		if($test['id'] == $id){
			$error = 1;

		}else{

		// check id co ten bi trung
			$error = 0;
			$_SESSION['nameerror'] = "Ten da ton tai";
			
		}

	}else{
		// khong ton tai var_dumo thi ket qua tra ve false ket qua bien $test thi update
		$error = 0;
	}

	if($error == 0){

		header('location:'.$adminUrl.'category/edit.php?id='.$id);
		die;

	}

	
		$sql = "update categories set name = :name, detail = :detail where id = $id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":detail", $detail);
		$stmt->execute();
		setcookie('esuccess', 'true', time() + 2, "/");



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