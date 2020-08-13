<?php 

  $path = "../";
  require_once $path.$path.'common/common.php';
  require_once $path.$path.'common/function.php';

  if(!isset($_SESSION['user'])){
    header('location:'.$adminUrl.'login.php');
    die;
  }

  $totalsp = count(getdata('products'));
  $limit = 6;
  $total_page = ceil($totalsp/$limit);

  $current_page = isset($_GET['page']) == true ? $_GET['page'] : 1;

  $star = ($current_page - 1) * $limit; 



  if(isset($_GET['cate_id']) and strlen($_GET['cate_id']) > 0){
    $cate_id = $_GET['cate_id'];
    $sql = "select * from products where cate_id = $cate_id order by id desc limit $star, $limit";
  }elseif (isset($_GET['brand_id']) and strlen($_GET['brand_id']) > 0) {
    $brand_id = $_GET['brand_id'];
    $sql = "select * from products where brand_id = $brand_id order by id desc limit $star, $limit";
  }elseif (isset($_GET['cate_id']) and strlen($_GET['cate_id']) > 0 and isset($_GET['brand_id']) and  strlen($_GET['brand_id']) > 0) {
    $cate_id = $_GET['cate_id'];
    $brand_id = $_GET['brand_id'];
    $sql = "select * from products where cate_id = $cate_id and brand_id = $brand_id order by id desc limit $star, $limit";
  }else{
    $sql = "select * from products order by id desc limit $star, $limit";
  }





  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $products = $stmt->fetchAll();

  $cates = getdata('categories');
  $brands = getdata('brands');
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
              <div class="pull-left" >
                <form action="" method="get" style="display: flex;"> 
                  <div class="form-group" style="margin: 0 5px">
                    <label>Phan theo loai:</label>
                    <select name="cate_id" class="form-control">
                      <option value=""></option>
                      <?php foreach ($cates as $c) { ?>
                      <option value="<?=$c['id'] ?>"><?=$c['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group" style="margin: 0 5px">
                    <label>Phan theo thuong hieu:</label>
                    <select name="brand_id" class="form-control">
                      <option value=""></option>
                      <?php foreach ($brands as $b) { ?>
                      <option value="<?=$b['id'] ?>"><?=$b['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div> 
                  <div class="form-group" style="margin: 0 5px">
                    
                    <button type="submit" class="btn btn-success">Send</button>             
                  </div>                 
                </form>
              </div>
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
                <thead class="text-center">
                  <tr role="row">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Scale</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Timedate</th>
                    <th>
                      <a href="javascript:" data-href="add.php" class="btn btn-success bm">Add</a>
                    </th>
                  </tr>
                </thead>
                <tbody class="text-center"> 
                  <?php foreach ($products as $p) : ?>                           
                    <tr>
                      <td><?= $p['id'] ?></td>
                      <td><?= $p['name'] ?></td>
                      <td><?= number_format($p['price'],0,"",",")." đ" ?></td>
                      <td><?= getname($p['brand_id'],'brands') ?></td>
                      <td><?= getname($p['cate_id'],'categories') ?></td>
                      <td>
                        <img src="<?= $siteUrl.$p['image'] ?>" width = '150' alt="chua co anh">
                      </td>
                      <td><?= $p['status'] == 0 ? "Active" : "Inactive" ?></td>
                      <td><?= $p['created_at'] ?></td>
                      <td>
                        <a href="javascript:" data-href="<?= $adminUrl ?>product/edit.php?id=<?= $p['id'] ?>" class="btn btn-primary bm">Edit</a>
                        <a href="javascript:" data-href="<?= $adminUrl ?>product/delete.php?id=<?= $p['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                
              </table></div></div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?= $adminUrl ?>" class="pull-left btn btn-default" title="">Back</a>
              <ul class="pagination pagination-sm no-margin pull-right">
                

                <?php if($current_page > 1){
             
                  if(!isset($cate_id) and !isset($brand_id)){
                    echo '<li><a href="'.$adminUrl.'product?page='.($current_page - 1).'">«</a></li>';
                  }elseif(isset($cate_id)){
                    echo '<li><a href="'.$adminUrl.'product?cate_id='.$cate_id.'&brand_id=&page='.($current_page - 1).'">«</a></li>';
                  }elseif(isset($brand_id)){
                    echo '<li><a href="'.$adminUrl.'product?cate_id=&brand_id='.$brand_id.'&page='.($current_page - 1).'">«</a></li>';
                  }else{
                    echo '<li><a href="'.$adminUrl.'product?cate_id='.$cate_id.'&brand_id='.$brand_id.'&page='.($current_page - 1).'">«</a></li>';
                  }           
                }else{
                  echo '<li><span>«</span></li>';
                } ?>
              
                <?php for ($i=1; $i <= $total_page; $i++) {  ?>
                  <?php if($current_page == $i) {
                    echo '<li><span style="background:#cccccc;color:white">'.$i.'</span></li>';
                   }else {
                      if(!isset($cate_id) and !isset($brand_id)){
                        echo '<li><a href="'.$adminUrl.'product?page='.$i.'">'.$i.'</a></li>';
                      }elseif(isset($cate_id)){
                        echo '<li><a href="'.$adminUrl.'product?cate_id='.$cate_id.'&brand_id=&page='.$i.'">'.$i.'</a></li>';
                      }elseif(isset($brand_id)){
                        echo '<li><a href="'.$adminUrl.'product?cate_id=&brand_id='.$brand_id.'&page='.$i.'">'.$i.'</a></li>';
                      }elseif(isset($cate_id) and isset($brand_id)){
                        echo '<li><a href="'.$adminUrl.'product?cate_id='.$cate_id.'&brand_id='.$brand_id.'&page='.$i.'">'.$i.'</a></li>';
                      }else{

                        echo '<li><a href="'.$adminUrl.'product?page='.$i.'">'.$i.'</a></li>';
                      }
                   }?>
                <?php } ?>

                <?php if($current_page < $total_page){

                    if(!isset($cate_id) and !isset($brand_id)){
                      echo '<li><a href="'.$adminUrl.'product?page='.($current_page + 1).'">»</a></li>';
                    }elseif(isset($cate_id)){
                      echo '<li><a href="'.$adminUrl.'product?cate_id='.$cate_id.'&brand_id=&page='.($current_page + 1).'">»</a></li>';
                    }elseif(isset($brand_id)){
                      echo '<li><a href="'.$adminUrl.'product?cate_id=&brand_id='.$brand_id.'&page='.($current_page + 1).'">»</a></li>';
                    }else{
                      echo '<li><a href="'.$adminUrl.'product?cate_id='.$cate_id.'&brand_id='.$brand_id.'&page='.($current_page + 1).'">»</a></li>';
                    }

                }else{
                    echo '<li><span>»</span></li>';
                } ?>
              </ul>
            </div>

          </div>  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'_share/comfirm.php'; ?>
  <?php include_once $path.'_share/footer.php'; ?>

  <?php include_once $path.'_share/bottom.php'; ?>
  
</body>
</html>