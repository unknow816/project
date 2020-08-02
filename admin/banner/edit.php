<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }

  $banner = getdata_by_id($id,'banner');

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
  <title>Admin info web</title>
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
      <div class="title">
        <h1>Add info web</h1>
      </div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        

        <div class="row">
          <form action="save-edit.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $banner['id'] ?> ">
              <div class="col-md-6">

                <div class="form-group">
                  <label>Image:*</label>
                  <input type="file" name="image">
                </div>
                
                <div class="form-group">
                  <label>Detail:</label>
                  <textarea name="detail" class="form-control" rows="4"><?= $banner['detail'] ?> </textarea>
                </div>

                <div class="form-group">
                  <label>Status:*</label>
                  <select name="status" class="form-control">
                    <option value=""></option>
                    <option <?php if($banner['status'] == 0) echo 'selected'  ?> value="0">active</option>
                    <option <?php if($banner['status'] == 1) echo 'selected'  ?> value="1">inactive</option>
                  </select>
                  <?php if(isset($_GET['statuserror'])) : ?>
                    <span class="text-danger"><?= $_GET['statuserror'] ?></span>
                  <?php endif ?>
                </div>

                <div class="form-group">
                  <input type="submit" name="send" class="btn btn-primary" value="Send">
                  <a class="btn btn-danger" href="<?= $adminUrl ?>banner">Back</a>
                </div>

              </div>

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