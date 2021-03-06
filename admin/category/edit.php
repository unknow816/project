<?php 
  
  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';
  if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "select * from categories where id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cate = $stmt->fetch();

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
        <h1>Edit Product</h1>
      </div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        

        <div class="row">
          <form action="<?= $adminUrl ?>category/save-edit.php" method="post">
              <input type="hidden" name="id" value="<?= $cate['id'] ?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name:*</label>
                  <input type="text" name="name" class="form-control" value="<?= $cate['name'] ?>">
                  <?php if(isset($_SESSION['nameerror'])): ?>
                    <span class="text-danger"><?= $_SESSION['nameerror'] ?></span>
                  <?php endif ?>
                </div>

                <div class="form-group">
                  <label>Detail:</label>
                  <textarea name="detail" class="form-control" rows="4" value="<?= $cate['detail'] ?>"></textarea>
                </div>

                <div class="form-group">
                  <input type="submit" name="send" class="btn btn-primary" value="Send">
                  <a class="btn btn-danger" href="<?= $adminUrl ?>category">Back</a>
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