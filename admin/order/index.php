<?php 

  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';


  if(isset($_GET['keyword'])){
    $phone = $_GET['keyword'];
    $sql = "select * from orders where phone like '%$phone%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $orders = $stmt->fetchAll();
  }else{
    $orders = getdata('orders');
  }

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
  <title>Admin Order</title>
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
              <h3 class="box-title">Table Oder</h3>
              <div class="pull-right form-group has-feedback">
                <form action="" method="get" accept-charset="utf-8">
                  <input type="search" name="keyword" value="" placeholder="Tim kiem theo sdt" class="form-control">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Total_product</th>
                    <th>Total_price</th>
                    <th>Status</th>
                    <th>Created_at</th>

                  </tr>
                  	<?php foreach ($orders as $o) { ?>
                    <tr>
                      <td><?= $o['id'] ?></td>
                      <td><?= $o['name'] ?></td>
                      <td><?= $o['email'] ?></td>
                      <td><?= $o['phone'] ?></td>
                      <td><?= $o['address'] ?></td>
                      <td><?= $o['total_product'] ?></td>
                      <td><?= number_format($o['total_price'],0,"",","); ?> d</td>
                      <td><form action="save.php" method="post"  accept-charset="utf-8" >
                      		<input type="hidden" name="id" value="<?= $o['id'] ?>">
                      		<select name="status" class="form-control" 
                            <?php if($o['status'] == 1 or $o['status'] == 2){ echo 'disabled'; }?>>
                      			<option <?php if($o['status'] == 0) echo "selected" ?> value="0">Đang xử lý...</option>
                            <option <?php if($o['status'] == 2) echo "selected" ?>  value="2">Hủy</option>
                      			<option <?php if($o['status'] == 1) echo "selected" ?>  value="1">Hoàn thành</option>
                      		</select>
                      		<button type="submit" class="btn btn-primary" <?php if($o['status'] == 1 or $o['status'] == 2) echo 'disabled' ?>>Cập nhật</button>
                      	  </form>
                      </td>
                      <td><?= $o['created_at'] ?></td>
                      <td>
                        <a href="javascript:" data-href="<?= $adminUrl ?>order/info.php?id=<?= $o['id'] ?>" class="btn btn-primary bm">Xem chi tiet..</a>
                        <a href="javascript:" data-href="<?= $adminUrl ?>order/delete.php?id=<?= $o['id'] ?>" title="" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
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