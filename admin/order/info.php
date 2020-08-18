<?php 

  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:'.$adminUrl.'order');
		die;
	}
	// $email = $sessionUser['email'];
	$sql = "select pro_id from order_detail where order_id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$pro_ids = $stmt->fetchAll();

	// echo "<pre>";
	// var_dump($pro_ids);
	// echo "</pre>";
	// echo $sql;
	$mang = [];
	foreach ($pro_ids as $key => $value) {
		$idp = $value['pro_id'];
		$sql = "select products.id,products.name,products.price,products.image,order_detail.quantity from products INNER JOIN order_detail on products.id = order_detail.pro_id where products.id = $idp and order_detail.order_id = $id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$pro = $stmt->fetch();
		array_push($mang, $pro);
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
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <tbody class="text-center">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total_price</th>

                  </tr>
                  	<?php foreach ($mang as $o) { ?>
                    <tr>
                      <td><?= $o['id'] ?></td>
                      <td><?= $o['name'] ?></td>
                      <td><img width="100" src="<?= $siteUrl.$o['image'] ?>" alt=""></td>
                      <td><?= $o['quantity'] ?></td>
                      <td><?= number_format($o['price'],0,"",","); ?> d</td>
                      <td><?= number_format($o['quantity']*$o['price'],0,"",","); ?> d</td>
                    </tr>                            
               		<?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?= $adminUrl ?>order" class="pull-left btn btn-default" title="">Back</a>
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