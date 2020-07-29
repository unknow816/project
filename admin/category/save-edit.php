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
			$nameerro = "Ten da ton tai";
			
		}

	}else{
		// khong ton tai var_dumo thi ket qua tra ve false ket qua bien $test thi update
		$error = 1;
	}

	if($error == 0){

		header('location:'.$adminUrl.'category/edit.php?id='.$id.'&nameerror='.$nameerro);
		die;

	}
	
		$sql = "update categories set name = :name, detail = :detail where id = $id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":detail", $detail);
		$stmt->execute();
		header('location:'.$adminUrl.'category?succes=true');



 ?>
 <h2>Edit Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>category?esucces=true";
 	},1500);
 </script>