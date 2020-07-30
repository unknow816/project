<?php 
	$path = "../";
	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location:'.$adminUrl.'setting_web');
		die;
	}


	$name = $_POST['name'];
	$email = $_POST['email'];
	$hotline = $_POST['hotline'];
	$map = $_FILES['map'];
	$logo = $_FILES['logo'];


	$erro = 0;
	$patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';
	$filename1 = "";
	$filename2 = "";

	if(strlen($name) == 0){
		$erro = 1;
		$nameerror = "Hay nhap ten";
	} elseif (strlen($name) > 50) {
		$erro = 1;
		$nameerror = "Khong nhap qua 150 ky tu";
	}


	if($email == ''){
		$erro = 1;
		$emailerror = "Hay nhap email";
	}elseif (!preg_match($patten, $email)) {
		$erro = 1;
		$emailerror = "Nhap dung dinh dang email vd:ten08@gmail.com";
	}

	if(strlen($hotline) == 0){
		$erro = 1;
		$hotlineerror = "Hay nhap so dien thoai";
	}else if (!is_numeric($hotline)) {
		$hotlineerror = "Hay nhap chu so";
	}elseif (strlen($hotline) < 9 || strlen($hotline) > 11) {
		$erro = 1;
		$hotlineerror = "Nhap toi thieu 10 chu so";
	}

	if(strlen($map['name']) == 0){
		$erro = 1;
		$maperror = "Hay chon anh";
	}

	if(strlen($logo['name']) == 0){
		$erro = 1;
		$logoerror = "Hay chon anh";
	}


	if($erro == 1){
		header('location:'.$adminUrl.'setting_web/add.php?nameerror='.$nameerror.'&emailerror='.$emailerror.'&hotlineerror='.$hotlineerror.'&maperror='.$maperror.'&logoerror='.$logoerror);
	}

	
	if($map['size'] > 0){
		$filename1 = 'images/setting_web/' . uniqid() . "-" . $map['name'];
		move_uploaded_file($map['tmp_name'], '../../'.$filename1);
	}

	if($logo['size'] > 0){
		$filename2 = 'images/setting_web/' . uniqid() . "-" . $logo['name'];
		move_uploaded_file($logo['tmp_name'], '../../'.$filename2);
	}

	$sql = " insert into web_setting (
                        name,
                        email,

                        hotline,
                        map,
                        logo

                        )values(
                        '$name',
                        '$email',

                        $hotline,
                        '$filename1',
                        '$filename2')";


     try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      } catch (Exception $e) {
        header('location:'.$adminUrl.'setting_web?error='.$e->getMessage());
        die;
      } 

 ?>
 <h2>ADD Success</h2>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>setting_web?success=true";
  },1500);
 </script>