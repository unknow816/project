<?php 

	$path = '../';

	require_once $path.$path.'common/common.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location:'.$adminUrl.'brand');
		die;
	}

	$id = $_POST['id'];
	$name = $_POST['name'];
	$detail = $_POST['detail'];
	$image = $_FILES['image'];

	$erro = 0;

	if(strlen($name) == 0){
		$erro = 1;
		$nameerror = "Hay Nhap ten";
	} elseif (strlen($name) > 100) {
		$erro = 1;
		$nameerror = "Khong nhap qua 100 ky tu";
	}

	$sql = "select * from brands where name = '$name'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$test = $stmt->fetch();

	if($test == true){
		if($test['id'] == $id){
			$erro = 0;
		}else{
			$erro = 1;
			$nameerror = "Ten da ton tai";
		}
	}



	if(strlen($detail) == 0){
		$erro = 1;
		$detailerror = "Hay nhap mo ta";
	}



	if($erro == 1){
		header('location:'.$adminUrl.'brand/edit.php?id='.$id.'&nameerror='.$nameerror.'&detailerror='.$detailerror.'&imageerror='.$imageerror);
		die;
	}


	$sql = "update brands set 
					name = '$name',
					detail = '$detail'";

	$filename = "";
	if($image['size'] > 0){
		$filename = 'images/brand/update/'. uniqid() . "-" . $image['name'];
		move_uploaded_file($image['tmp_name'], '../../'.$filename);
		$sql .= ",image = '$filename'";
	}
	$sql .= "where id = $id" ;
	$stmt = $conn->prepare($sql);
	$stmt->execute();

 ?>
 <h2>Update Success Loading ....</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>brand?esuccess=true";
 	},1500);
 </script>