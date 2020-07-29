<?php 

  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if(!isset($_SESSION['user'])){
    header('location:'.$adminUrl.'login.php');
    die;
  }


  $sql = "select * from products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $products = $stmt->fetchAll();

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
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
              <div class="pull-right form-group has-feedback">
                <form action="" method="get" accept-charset="utf-8">
                  <input type="search" name="keyword" value="" placeholder="" class="form-control">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr role="row">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Scale</th>
                    <th>Image</th>
                    <th>Detail</th>
                    <th>Status</th>
                    <th>Timedate</th>
                    <th>
                      <a href="javascript:" data-href="add.php" class="btn btn-success bm">Add</a>
                    </th>
                  </tr>
                </thead>
                <tbody> 
                  <?php foreach ($products as $p) : ?>                           
                    <tr>
                      <td><?= $p['id'] ?></td>
                      <td><?= $p['name'] ?></td>
                      <td><?= $p['price'] ?></td>
                      <td><?= getname($p['brand_id'],'brands') ?></td>
                      <td><?= getname($p['cate_id'],'categories') ?></td>
                      <td>
                        <img src="<?= $siteUrl.$p['image'] ?>" width = '70' alt="chua co anh">
                      </td>
                      <td><?= $p['detail'] ?></td>
                      <td><?= $p['status'] == 0 ? "Active" : "Inactive" ?></td>
                      <td><?= $p['created_at'] ?></td>
                      <td>
                        <a href="javascript:" data-href="<?= $adminUrl ?>/product/edit.php?id=<?= $p['id'] ?>" class="btn btn-primary bm">Edit</a>
                        <a href="javascript:" data-href="<?= $adminUrl ?>/product/delete.php?id=<?= $p['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                
              </table></div></div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?= $adminUrl ?>" class="pull-left btn btn-default" title="">Back</a>
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>

          </div>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'_share/comfirm.php'; ?>
  <?php include_once $path.'_share/footer.php'; ?>

  <?php include_once $path.'_share/bottom.php' ?>
  
</body>
</html>