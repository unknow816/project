<?php 

	require_once './common/common.php';
	require_once './common/function.php';
	// if(isset($_COOKIE['tsuccess'])){
	// 	var_dump($_COOKIE['tsuccess']);
	// 	die;
	// }

	$products = limitdata('products',0,6);

	$brands = getdata('brands');

	$sql = "select * from products where status = 0 limit 0,3 ";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$rproducts = $stmt->fetchAll();

	$sql = "select * from products where status = 0 limit 3,3 ";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$rproducts2 = $stmt->fetchAll();


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>
	
	<?php include_once './_share/slide.php'; ?>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include_once './_share/slidebar.php'; ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm mới</h2>
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
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
						<!-- Lặp vòng foreach với điều kiện là hiển thị tên class là active để trên giao diện-->
							   <?php 
							   		$count = 0;
							   		foreach ($brands as $b) {							   			
							   			$activeb = $count == 0 ? "active" : "";
							   	?>
								<li class="<?= $activeb ?>"><a href="<?="#".strtolower(trim($b['name']))?>" data-toggle="tab"><?=strtoupper($b['name']) ?></a></li>
								
							   <?php 
							   		$count++;
								} ?>
							</ul>
						</div>
						<div class="tab-content">
							<?php 
								$count = 0;
								foreach ($brands as $b) { 
									$activei = $count == 0 ? "active in" : "";
							?>
							<div class="tab-pane fade <?= $activei ?>" id="<?=strtolower(trim($b['name'])) ?>" >
								<div class="col-sm-12">
									<div class="col-sm-4 text-center">
										<img src="<?= $siteUrl.$b['image'] ?>" width="150" alt="">
									</div>
									<div class="col-sm-8">
										<p><?= $b['detail'] ?></p>
									</div>
								</div>														
							</div>
							<?php 
								$count++;
							} 
							?>

						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm mua nhiều</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								  <?php foreach ($rproducts as $rp) { ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-detail.php?id=<?= $rp['id'] ?>" title="">
													<img src="<?= $siteUrl.$rp['image'] ?>" alt="" class="img-thumbnail" />
													</a>
													<h2><?= number_format($rp['price'],0,"",",")." đ" ?></h2>
													<a href="product-detail.php?id=<?= $rp['id'] ?>" title="">
														<?= $rp['name'] ?>												
													</a>
													<p>Thương hiệu: <span style="font-weight: bold"> <?= getname($rp['brand_id'],'brands') ?> </span></p>
													<button type="button" class="btn btn-fefault cart" onclick="addcart(<?=$rp['id'] ?>)" ><i class="fa fa-shopping-cart"></i>
														Add to cart
													</button>	
												</div>
											</div>
										</div>
									</div>
								  	<?php } ?>									
								</div>
								<div class="item">	
									<?php foreach ($rproducts2 as $rp) { ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-detail.php?id=<?= $rp['id'] ?>" title="">
													<img src="<?= $siteUrl.$rp['image'] ?>" alt="" class="img-thumbnail" />
													</a>
													<h2><?= number_format($rp['price'],0,"",",")." đ" ?></h2>
													<a href="product-detail.php?id=<?= $rp['id'] ?>" title="">
														<?= $rp['name'] ?>												
													</a>
													<p>Thương hiệu: <span style="font-weight: bold"> <?= getname($rp['brand_id'],'brands') ?> </span></p>
													<button type="button" class="btn btn-fefault cart" onclick="addcart(<?=$rp['id'] ?>)" ><i class="fa fa-shopping-cart"></i>
														Add to cart
													</button>	
												</div>
											</div>
										</div>
									</div>
								  	<?php } ?>	
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include_once './_share/footer.php'; ?>
	

  
	<?php include_once './_share/bottom.php'; ?>
	<script type="text/javascript">



		function addcart(n){
			$.get('<?=$siteUrl ?>cart/add.php?id='+n, function(data) {
				window.scrollTo(0,0);
				$('body').load('<?=$siteUrl ?>index.php');
			});

		};



	</script>
</body>
</html>