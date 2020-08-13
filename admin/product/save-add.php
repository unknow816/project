<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:'.$adminUrl.'product');
    die;
  }


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
  $created_at = date("Y/m/d");

  $erro = 0;
  $check = check('products','name',$name);

  if(strlen($name) == 0){
    $erro = 1;
    $_SESSION['nameerror'] = "Hay nhap ten";
  } elseif (strlen($name) > 150) {
    $erro = 1;
    $_SESSION['nameerror'] = "Khong nhap qua 150 ky tu";
  } elseif ($check == true) {
    $erro = 1;
    $_SESSION['nameerror'] = "Ten da ton tai";
  }else{
    $_SESSION['nameerror'] = "";
  }

  if($price == ''){
    $erro = 1;
    $_SESSION['priceerror'] = "Hay nhap gia";
  }elseif (!is_numeric($price)) {
    $erro = 1;
    $_SESSION['priceerror'] = "Hay nhap chu so";
  }elseif ($price < 0 OR $price <= 49999) {
    $erro = 1;
    $_SESSION['priceerror'] = "Phai nhap gia lon hon 0 va nhap gia toi thieu la 50.000 VND";
  } elseif (strlen($price) > 7 ) {
    $erro = 1;
    $_SESSION['priceerror'] = "Khong nhap qua so tien 10.000.000 VND";
  } else{
    $_SESSION['priceerror'] = "";
  }

  if($brand == ""){
    $erro = 1;
    $_SESSION['branderror'] = "Hay chon hang";
  }else{
    $_SESSION['branderror'] = "";
  }

  if(strlen($size) == 0){
    $erro = 1;
    $_SESSION['sizeerror'] = "Hay nhap kich thuoc";
  }else{
    $_SESSION['sizeerror'] = "";
  }

  if($scale == ""){
    $erro = 1;
    $_SESSION['scaleerror'] = "Hay chon ti le";
  }else{
    $_SESSION['scaleerror'] = "";
  }

  if($status == ""){
    $erro = 1;
    $_SESSION['statuserror'] = "Hay chon trang thai";
  }else{
    $_SESSION['statuserror'] = "";
  }

  if(strlen($image['name']) == 0){
    $erro = 1;
    $_SESSION['imageerror'] = "Hay chon anh";
  }else{
    $_SESSION['imageerror'] = "";
  }



  if($erro == 1){
    header('location:'.$adminUrl.'product/add.php');
    die;
  }


  if($image['size'] > 0){
    $filename = 'images/product/' . uniqid() . "-" . $image['name'];
    move_uploaded_file($image['tmp_name'], '../../'.$filename);
  }

  $sql = " insert into products (
                        name,
                        price,

                        brand_id,
                        size,
                        function,

                        package,
                        detail,
                        cate_id,

                        status,
                        created_at,
                        image)values(

                        '$name',
                        $price,
                        $brand,

                        '$size',
                        '$function',
                        '$package',

                        '$detail',
                        $scale,
                        $status,

                        '$created_at',
                        '$filename')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
      
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
    <?php include_once $path.$path.'_share/client.php'; ?>
</head><!--/head-->
<body class="text-center" >

    <h2 style="margin: 350px 0;">Loading .....</h2>
  
</body>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>product";
  },1500);
 </script>
</html>