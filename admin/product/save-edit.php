<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:'.$adminUrl.'product');
    die;
  }

  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $brand = $_POST['brand'];
  $size = $_POST['size'];
  $function = $_POST['function'];
  $package = $_POST['package'];
  $image = $_FILES['image'];
  $detail = $_POST['detail'];
  $scale = $_POST['scale'];
  $status = $_POST['status'];



  $erro = 0;
  $filename = "";

  if(strlen($name) == 0){
    $erro = 1;
    $nameerror = "Hay nhap ten";
  } elseif (strlen($name) > 150) {
    $erro = 1;
    $nameerror = "Khong nhap qua 150 ky tu";
  }

  if($price == ''){
    $erro = 1;
    $priceerror = "Hay nhap gia";
  }elseif ($price < 0 OR $price <= 49999) {
    $erro = 1;
    $priceerror = "Phai nhap gia lon hon 0 va nhap gia toi thieu la 50.000 VND";
  } elseif (strlen($price) > 7 ) {
    $erro = 1;
    $priceerror = "Khong nhap qua so tien 10.000.000 VND";
  }

  if($brand == ""){
    $erro = 1;
    $branderror = "Hay chon hang";
  }

  if(strlen($size) == 0){
    $erro = 1;
    $sizeerror = "Hay nhap chieu dai x chieu rong x chieu cao";
  }

  if($scale == ""){
    $erro = 1;
    $scaleerror = "Hay chon ti le";
  }

  if($status == ""){
    $erro = 1;
    $statuserror = "Hay chon hien thi hoac khong";
  }



  if($erro == 1){
    header('location:'.$adminUrl.'product/edit.php?nameerror='.$nameerror.'&priceerror='.$priceerror.'&branderror='.$branderror.'&sizeerror='.$sizeerror.'&scaleerror='.$scaleerror.'&statuserror='.$statuserror);
  }


  $sql = "update products set name = '$name',
  							  price = $price,
  							  brand_id = $brand,

  							  size = '$size',
  							  function = '$function',
  							  package = '$package',

  							  detail = '$detail',
  							  cate_id = $scale,
  							  status = $status";

                        
    if($image['size'] > 0){
        $filename = 'images/product/update/' . uniqid() . "-" . $image['name'];
        move_uploaded_file($image['tmp_name'], '../../'.$filename);
        $sql .= ",image = '$filename'";
    }
    $sql .= " where id = $id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

 ?>

 <h2>Edit Success Loading....</h2>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>product?esuccess=true";
  },1500);
 </script>