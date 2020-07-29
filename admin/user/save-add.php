<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:'.$adminUrl.'user');
    die;
  }


  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];
  $created_at = date('Y/m/d');

  $avatar = $_FILES['avatar'];
  $erro = 0;
  $patten = '/^[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';
  $checkemail = check('users','email',$email);
  $filename = "";

  if(strlen($name) == 0){
    $erro = 1;
    $nameerror = "Hay nhap ten";
  } elseif (strlen($name) > 50) {
    $erro = 1;
    $nameerror = "Khong nhap qua 50 ky tu";
  }

  if($email == ''){
    $erro = 1;
    $emailerror = "Hay nhap email";
  }elseif (!preg_match($patten, $email)) {
    $erro = 1;
    $emailerror = "Nhap dung dinh dang email vd:ten08@gmail.com";
  }elseif ($checkemail == true) {
    $erro = 1;
    $emailerror = "Email da ton tai";
  }

  if($password == ""){
    $erro = 1;
    $passworderror = "Hay nhap mat khau";
  }elseif (strlen($password) < 6) {
    $erro = 1;
    $passworderror = "Nhap mat khau dai hon 6 ky tu";
  }

  if(strlen($phone) == 0){
    $erro = 1;
    $phoneerror = "Hay nhap so dien thoai";
  }else if (!is_numeric($phone)) {
    $phoneerror = "Hay nhap chu so";
  }elseif (strlen($phone) < 9 || strlen($phone) > 11) {
    $erro = 1;
    $phoneerror = "Nhap toi thieu 10 chu so";
  }

  if($address == ""){
    $erro = 1;
    $addresserror = "Hay nhap dia chi";
  } else if (strlen($address) > 150) {
    $erro = 1;
    $addresserror = "Khong nhap qua 150 ky tu";
  }

  if($status == ""){
    $erro = 1;
    $statuserror = "Hay chon hien thi hoac khong";
  }

  if(strlen($avatar['name']) == 0){
    $erro = 1;
    $avatarerror = "Hay chon anh";
  }





  if($erro == 1){
    header('location:'.$adminUrl.'user/add.php?nameerror='.$nameerror.'&emailerror='.$emailerror.'&passworderror='.$passworderror.'&phoneerror='.$phoneerror.'&addresserror='.$addresserror.'&statuserror='.$statuserror.'&avatarerror='.$avatarerror);
  }


  if($avatar['size'] > 0){
    $filename = 'images/user/' . uniqid() . "-" . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], '../../'.$filename);
  }

  $password = password_hash($password, PASSWORD_DEFAULT);


  $sql = " insert into users (
                        name,
                        email,

                        password,
                        role,
                        phone,

                        address,
                        gender,
                        status,
                        created_at,

                        avatar)values(
                        '$name',
                        '$email',

                        '$password',
                        $role,
                        $phone,

                        '$address',
                        $gender,
                        $status,

                        '$created_at',
                        '$filename')";

     try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      } catch (Exception $e) {
        header('location:'.$adminUrl.'user?error='.$e->getMessage());
        die;
      } 

 ?>

 <h2>ADD Success</h2>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>user?success=true";
  },1500);
 </script>