<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from users where id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch();

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
              <h3 class="box-title">Add user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="save-edit.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <div class="box-body col-sm-6">
                <div class="form-group">
                  <label>Name:*</label>
                  <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
                  <?php if(isset($_GET['nameerror'])) : ?>
                    <span class="text-danger"><?= $_GET['nameerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Email:*</label>
                  <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
                  <?php if(isset($_GET['emailerror'])) : ?>
                    <span class="text-danger"><?= $_GET['emailerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Password:*</label>
                  <input type="password" name="password" class="form-control">
                  <?php if(isset($_GET['passworderror'])) : ?>
                    <span class="text-danger"><?= $_GET['passworderror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Role:</label>
                  <select name="role" class="form-control">
                    <option value="0"></option>
                    <option <?php if($user['role'] == 1) echo 'selected'; ?> value="1">Menber</option>
                    <option <?php if($user['role'] == 8) echo 'selected'; ?> value="8">Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Phone:*</label>
                  <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?> ">
                  <?php if(isset($_GET['phoneerror'])) : ?>
                    <span class="text-danger"><?= $_GET['phoneerror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Address:*</label>
                  <input type="text" class="form-control" name="address"  value="<?= $user['address'] ?> ">
                  <?php if(isset($_GET['addresserror'])) : ?>
                    <span class="text-danger"><?= $_GET['addresserror'] ?></span>
                  <?php endif ?>
                </div>
                <div class="form-group">
                  <label>Avatar:*</label>
                  <input type="file" name="avatar">
                  <?php if(isset($_GET['avatarerror'])) : ?>
                    <span class="text-danger"><?= $_GET['avatarerror'] ?></span>
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
                    <option value=""></option>
                    <option <?php if($user['gender'] == 0) echo 'selected'; ?> value="0">Nam</option>
                    <option <?php if($user['gender'] == 1) echo 'selected'; ?> value="1">Nu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status:*</label>
                  <select name="status" class="form-control">
                    <option value=""></option>
                    <option <?php if($user['status'] == 0) echo 'selected'; ?> value="0">active</option>
                    <option <?php if($user['status'] == 1) echo 'selected'; ?> value="1">inactive</option>
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