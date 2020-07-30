<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }

  $setting_web = getdata_by_id($id,'web_setting');

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
  <title>Admin Category</title>
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
              <input type="hidden" name="id" value="<?= $setting_web['id'] ?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name:*</label>
                  <input type="text" name="name" value="<?= $setting_web['name'] ?>" class="form-control">
                  <?php if(isset($_GET['nameerror'])): ?>
                    <span class="text-danger"><?= $_GET['nameerror'] ?></span>
                  <?php endif ?>
                </div>

                <div class="form-group">
                	<label>Email:*</label>
                	<input type="text" class="form-control" value="<?= $setting_web['email'] ?>" name="email">
                	<?php if(isset($_GET['emailerror'])) : ?>
                		<span class="text-danger"><?= $_GET['emailerror'] ?></span>
                	<?php endif ?>
                </div>

                <div class="form-group">
                  <label>Hotline:*</label>
                  <input type="text" class="form-control" value="<?= $setting_web['hotline'] ?>" name="hotline">
                  <?php if(isset($_GET['hotlineerror'])) : ?>
                    <span class="text-danger"><?= $_GET['hotlineerror'] ?></span>
                  <?php endif ?>
                </div>

                <div class="form-group">
                	<label>Map:*</label>
                	<input type="file" name="map">

                </div>

                <div class="form-group">
                  <label>Logo:*</label>
                  <input type="file" name="logo">

                </div>

                <div class="form-group">
                  <input type="submit" name="send" class="btn btn-primary" value="Send">
                  <a class="btn btn-danger" href="<?= $adminUrl ?>setting_web">Back</a>
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