<?php 
	require_once './common/common.php';
	require_once './common/function.php';



	$totalsp = count(getdata('products'));
	$limit = 6;
	$total_page = ceil($totalsp/$limit);

	$current_page = isset($_GET['page']) == true ? $_GET['page'] : 1;

	$star = ($current_page - 1) * $limit; 

	if(isset($_GET['search'])){
		$name = $_GET['search'];
		$sql = "select * from products where status = 0 and name like '%$name%'";
	}elseif(isset($_GET['cate_id'])){
		$cate_id = $_GET['cate_id'];
		$sql = "select * from products where status = 0 and cate_id = $cate_id limit $star, $limit";
	}elseif(isset($_GET['brand_id'])){
		$brand_id = $_GET['brand_id'];
		$sql = "select * from products where status = 0 and brand_id = $brand_id limit $star, $limit";
	}else{
		$sql = "select * from products where status = 0 limit $star, $limit";
	}

		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$products = $stmt->fetchAll();

	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>
	

	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include_once './_share/slidebar.php'; ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm Fshop</h2>
						<?php foreach ($products as $p) { ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="product-detail.php?id=<?= $p['id'] ?>" title="">
												<img src="<?= $siteUrl.$p['image'] ?>" alt="" class="img-thumbnail" />
											</a>
											<h2><?= number_format($p['price'],0,"",",")." đ" ?></h2>
											<a href="product-detail.php?id=<?= $p['id'] ?>" title="">
												<?= $p['name'] ?>												
											</a>
											<p>Thương hiệu: <span style="font-weight: bold"> <?= getname($p['brand_id'],'brands') ?> </span></p>
											<button type="button" class="btn btn-fefault cart" onclick="addcart(<?=$p['id'] ?>)" ><i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>	
										</div>
										
									</div>
							
								</div>
							</div>
						<?php } ?>
					
						
						<ul class="pagination col-sm-12">
							<?php if($current_page > 1){

								if(!isset($cate_id) and !isset($brand_id)){
									echo '<li><a href="'.$siteUrl.'shop.php?page='.($current_page - 1).'">«</a></li>';
								}elseif(isset($cate_id)){
									echo '<li><a href="'.$siteUrl.'shop.php?cate_id='.$cate_id.'&page='.($current_page - 1).'">«</a></li>';
								}elseif(isset($brand_id)){
									echo '<li><a href="'.$siteUrl.'shop.php?brand_id='.$brand_id.'&page='.($current_page - 1).'">«</a></li>';
								}           
							}else{
								echo '<li><span>«</span></li>';
							} ?>

							<?php for ($i=1; $i <= $total_page; $i++) {  ?>
								<?php if($current_page == $i) {
									echo '<li><span style="background:#cccccc;color:white">'.$i.'</span></li>';
								}else {
									if(!isset($cate_id) and !isset($brand_id)){
										echo '<li><a href="'.$siteUrl.'shop.php?page='.$i.'">'.$i.'</a></li>';
									}elseif(isset($cate_id)){
										echo '<li><a href="'.$siteUrl.'shop.php?cate_id='.$cate_id.'&page='.$i.'">'.$i.'</a></li>';
									}elseif(isset($brand_id)){
										echo '<li><a href="'.$siteUrl.'shop.php?brand_id='.$brand_id.'&page='.$i.'">'.$i.'</a></li>';
									}else{

										echo '<li><a href="'.$siteUrl.'shop.php?page='.$i.'">'.$i.'</a></li>';
									}
								}?>
							<?php } ?>

							<?php if($current_page < $total_page){

								if(!isset($cate_id) and !isset($brand_id)){
									echo '<li><a href="'.$siteUrl.'shop.php?page='.($current_page + 1).'">»</a></li>';
								}elseif(isset($cate_id)){
									echo '<li><a href="'.$siteUrl.'shop.php?cate_id='.$cate_id.'&page='.($current_page + 1).'">»</a></li>';
								}elseif(isset($brand_id)){
									echo '<li><a href="'.$siteUrl.'shop.php?brand_id='.$brand_id.'&page='.($current_page + 1).'">»</a></li>';
								}

							}else{
								echo '<li><span>»</span></li>';
							} ?>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	<?php include_once './_share/footer.php'; ?>
	

  
    <?php include_once './_share/bottom.php'; ?>
    <script type="text/javascript">
    	


    	function addcart(n){
    		$.get('<?=$siteUrl ?>cart/add.php?id='+n, function(data) {

    			$('body').load('<?=$siteUrl ?>shop.php');
    			
    		});

    	};

    	

    </script>
</body>
</body>
</html>