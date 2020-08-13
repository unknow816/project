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
              <h3 class="box-title">Add product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="save-add.php" method="post" enctype="multipart/form-data">
              <div class="box-body col-sm-6">
                <div class="form-group">
                  <label>Name:*</label>
                  <input type="text" class="form-control" name="name">
                  <?php if(isset($_SESSION['nameerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['nameerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Price:*</label>
                  <input type="text" class="form-control" name="price">
                  <?php if(isset($_SESSION['priceerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['priceerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Brand:*</label>
                  <select name="brand" class="form-control">
                  	<option value=""></option>
                  	<?php foreach ($brands as $b) : ?>
                      <option value="<?= $b['id'] ?>"><?= $b['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <?php if(isset($_SESSION['branderror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['branderror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Size:*</label>
                  <input type="text" class="form-control" name="size">
                  <?php if(isset($_SESSION['sizeerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['sizeerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Function</label>
                  <input type="text" class="form-control" name="function">
                </div>
                <div class="form-group">
                  <label>Package</label>
                  <input type="text" class="form-control" name="package">
                </div>
                <div class="form-group">
                  <label>Image:*</label>
                  <input type="file" name="image">
                  <?php if(isset($_SESSION['imageerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['imageerror'] ?></span>
                  <?php endif ?>
                  <p class="help-block">Example block-level help text here.</p>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="index.php" class="btn btn-danger">Back</a> 
                </div>

              </div>

              <div class="box-body col-sm-6">
                <div class="form-group">
                  <label>Detail:</label>
                  <textarea name="detail" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Scale:*</label>
                  <select name="scale" class="form-control">
                    <option value=""></option>
                    <?php foreach ($cates as $c) : ?>
                      <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <?php if(isset($_SESSION['scaleerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['scaleerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Status:*</label>
                  <select name="status" class="form-control">
                    <option value=""></option>
                    <option value="0">active</option>
                    <option value="1">inactive</option>
                  </select>
                  <?php if(isset($_SESSION['statuserror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['statuserror'] ?></span>
                  <?php endif ?>
                </div>
                removed timedate
                
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