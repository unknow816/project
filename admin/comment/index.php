<?php 

  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  $comments = getdata('comments');

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
  <title>Admin Comment</title>
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

      <!--------------------------
        | Your Page Content Here |
        -------------------------->





        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Table Comment</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Pro_id</th>
                  </tr>
                  	<?php foreach ($comments as $c) { ?>
                    <tr>
                      <td><?= $c['id'] ?></td>
                      <td><?= $c['name'] ?></td>
                      <td><?= $c['email'] ?></td>
                      <td><?= $c['content'] ?></td>
                      <td><?= $c['pro_id'] ?></td>
                      <td>
                        <a href="javascript:" data-href="<?= $adminUrl ?>comment/delete.php?id=<?= $c['id'] ?>" title="" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
                      </td>
                    </tr>                            
               		<?php } ?>
                </tbody>
              </table>
            </div>
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