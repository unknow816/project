<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:'.$adminUrl.'user');
    die;
  }
  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];

  $avatar = $_FILES['avatar'];

  $erro = 0;
  $patten = '/[a-z0-9]+@[a-z0-9]+(.[a-z]{2,})+$/';
  $checkemail = check('users','email',$email);
  $filename = "";
  // always use var_dump()
  // echo substr_compare(4,4,0);

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
  }elseif (!preg_match($patten,$email)) {
    $erro = 1;
    $emailerror = "Nhap dung dinh dang email vd:ten08@gmail.com";
  }elseif($checkemail == true){

    if($checkemail['id'] == $id){
      $erro = 0;
    }else{
      $erro = 1;
      $emailerror = "Email da ton tai";
    }
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






  if($erro == 1){
    header('location:'.$adminUrl.'user/edit.php?id='.$id.'&nameerror='.$nameerror.'&emailerror='.$emailerror.'&passworderror='.$passworderror.'&phoneerror='.$phoneerror.'&addresserror='.$addresserror.'&statuserror='.$statuserror);
  }

  




  $sql = " update users set name = '$name',
                            email = '$email',
                            role = $role,

                            phone = $phone,
                            address = '$address',
                            gender = $gender,

                            status = $status ";


  if(strlen($password) > 0){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql .= ", password = '$password'";
  }



  if($avatar['size'] > 0){
    $filename = 'images/user/update/' . uniqid() . "-" . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], '../../'.$filename);
    $sql .= ", avatar = '$filename'";
  }

  $sql .= " where id = $id";


    $stmt = $conn->prepare($sql);
    $stmt->execute();

 ?>

 <h2>EDIT Success</h2>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>user?esuccess=true";
  },1500);
 </script>