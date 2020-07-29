<?php 

  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  $sql ="select *from users";
  $stmt= $conn->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll();

  if(!isset($_SESSION['user'])){
    header('location:'.$adminUrl.'login.php');
    die;
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
  <title>Admin User</title>
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

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr role="row">
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Avatar</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Create_at</th>
                    <th>
                      <a href="javascript:" data-href="<?= $adminUrl ?>user/add.php" class="btn btn-success bm">Add</a>
                    </th>
                  </tr>
                </thead>
                <tbody> 
                  <?php foreach ($users as $u) : ?>                         
                    <tr>
                      <td><?= $u['id'] ?></td>
                      <td><?= $u['email'] ?></td>
                      <td><?= $u['name'] ?></td>
                      <td><?php if($u['role'] == 0){
                        echo "Chua co";
                      }elseif ($u['role'] == 1) {
                        echo "Menber";
                      }else{
                        echo "Admin";
                      } ?></td>
                      <td>
                        <img src="<?=$siteUrl. $u['avatar'] ?>" width = '70' alt="chua co anh">
                      </td>
                      <td><?= $u['address'] ?></td>
                      <td> <?= $u['phone'] ?></td>
                      <td><?= $u['gender'] == 0? "Nam" : "Nu" ?></td>
                      <td><?= $u['status'] == 0? "active" : "inactive" ?></td>
                      <td><?php setdate($u['created_at']) ?></td>
                      <td>
                        <a href="javascript:" data-href="<?= $adminUrl ?>user/edit.php?id=<?= $u['id'] ?>" class="btn btn-primary bm">Edit</a>
                        <a href="javascript:" data-href="<?= $adminUrl ?>user/delete.php?id=<?= $u['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
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