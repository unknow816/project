<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

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
              <h3 class="box-title">Add user</h3>
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
                  <label>Email:*</label>
                  <input type="text" class="form-control" name="email">
                  <?php if(isset($_SESSION['emailerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['emailerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Password:*</label>
                  <input type="password" name="password" class="form-control">
                  <?php if(isset($_SESSION['passworderror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['passworderror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Role:</label>
                  <select name="role" class="form-control">
                    <option value="0"></option>
                    <option value="1">Menber</option>
                    <option value="8">Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Phone:*</label>
                  <input type="text" class="form-control" name="phone">
                  <?php if(isset($_SESSION['phoneerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['phoneerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Address:*</label>
                  <input type="text" class="form-control" name="address">
                  <?php if(isset($_SESSION['addresserror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['addresserror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Avatar:*</label>
                  <input type="file" name="avatar">
                  <?php if(isset($_SESSION['avatarerror'])) : ?>
                    <span class="text-danger"><?= $_SESSION['avatarerror'] ?></span>
                  <?php endif ?>

                  
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="index.php" class="btn btn-danger">Back</a> 
                </div>

              </div>

              <div class="box-body col-sm-6">               
                <div class="form-group">
                  <label>Gender:</label>
                  <select name="gender" class="form-control">
                    <option value="0">Unknow</option>
                    <option value="2">Nam</option>
                    <option value="1">Nu</option>
                  </select>
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