<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';
    $sql = "select * from brands";
  	$stmt = $conn->prepare($sql);
  	$stmt->execute();
  	$brands = $stmt->fetchAll();

  	$sql = "select * from categories";
  	$stmt = $conn->prepare($sql);
  	$stmt->execute();
  	$cates = $stmt->fetchAll();



  if(isset($_GET['id'])){

  	$id = $_GET['id'];
  	$sql = "select * from products where id = $id";
  	$stmt = $conn->prepare($sql);
  	$stmt->execute();

  	$product = $stmt->fetch();

  }else{
  	$id = "";
  }

 ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Product</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php 

    include_once $path.'_share/top_asset.php';

   ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include_once $path.'_share/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once $path.'_share/slide_bar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

     <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= $adminUrl ?>/product/save-edit.php" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="id" value="<?= $product['id'] ?>">
              <div class="box-body col-sm-6">
                <div class="form-group">
                  <label>Name:*</label>
                  <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">

                  <?php if(isset($_GET['nameerror'])) : ?>
                    <span class="text-danger"><?= $_GET['nameerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Price:*</label>
                  <input type="text" class="form-control" name="price" value="<?= $product['price'] ?>">

                  <?php if(isset($_GET['priceerror'])) : ?>
                    <span class="text-danger"><?= $_GET['priceerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Brand:*</label>
                  <select name="brand" class="form-control">
                  	<option value=""></option>
                  	<?php foreach ($brands as $b) : ?>
                  		<option <?php if($product['brand_id'] == $b['id']) echo "selected" ?> value="<?= $b['id'] ?>"><?= $b['name'] ?></option>
                  	<?php endforeach ?>
                  </select>

                  <?php if(isset($_GET['branderror'])) : ?>
                    <span class="text-danger"><?= $_GET['branderror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Size:*</label>
                  <input type="text" class="form-control" name="size" value="<?= $product['size'] ?>">

                  <?php if(isset($_GET['sizeerror'])) : ?>
                    <span class="text-danger"><?= $_GET['sizeerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Function</label>
                  <input type="text" class="form-control" name="function" value="<?= $product['function'] ?>">
                </div>
                <div class="form-group">
                  <label>Package</label>
                  <input type="text" class="form-control" name="package" value="<?= $product['package'] ?>">
                </div>
                <div class="form-group">
                  <label>Image:*</label>
                  <input type="file" name="image">

                  <p class="help-block">Example block-level help text here.</p>
                  <img  src="<?= $product['image'] ?>" width = '150' alt="">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="index.php" class="btn btn-danger">Back</a> 
                </div>

              </div>

              <div class="box-body col-sm-6">
                <div class="form-group">
                  <label>Detail:</label>
                  <textarea name="detail" rows="4" class="form-control"><?= $product['detail'] ?></textarea>
                </div>
                <div class="form-group">
                  <label>Scale:*</label>
                  <select name="scale" class="form-control">
                    <option value=""></option>
                  	<?php foreach ($cates as $c) : ?>
                  		<option <?php if($product['cate_id'] == $c['id']) echo "selected" ?> value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                  	<?php endforeach ?>
                  </select>

                  <?php if(isset($_GET['scaleerror'])) : ?>
                    <span class="text-danger"><?= $_GET['scaleerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Status:*</label>
                  <select name="status" class="form-control">
                    <option value=""></option>
                    <option <?php if($product['status'] == 0) echo "selected" ?> value="0">active</option>
                    <option <?php if($product['status'] == 1) echo "selected" ?> value="1">inactive</option>
                  </select>

                  <?php if(isset($_GET['statuserror'])) : ?>
                    <span class="text-danger"><?= $_GET['statuserror'] ?></span>
                  <?php endif ?>
                </div>               
              </div>
              <!-- /.box-body -->

              <div class="box-footer"></div>
            </form>
         </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once $path.'_share/footer.php'; ?>


  <?php include_once $path.'_share/bottom.php' ?>
</body>
</html>