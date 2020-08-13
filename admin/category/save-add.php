<?php 

	require_once '../../common/common.php';

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
		$nameerro = "Hay nhap ten";
	}

	if(strlen($name) > 50){
		$error = 0;
		$nameerro = "Khong nhap qua 50 ky tu";
	}


	$sql = "select * from categories where name = :name ";
	$check = $conn->prepare($sql);
	$check->bindParam(":name", $name);
	$check->execute();
	$test = $check->fetch();

	if($test){

		$error = 0;
		$nameerro = "Ten da ton tai";

	}

	if($error == 0){

		header('location:'.$adminUrl.'category/add.php?nameerror='.$nameerro);
		die;

	}
	
		$sql = "insert into categories (name,detail) values (:name, :detail)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":detail", $detail);
		$stmt->execute();
		//header('location:'.$adminUrl.'category?succes=true');



 ?>
  <h2>ADD Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>category?success=true";
 	},1500);
 </script>