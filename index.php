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
						<h2 class="title text-center">Features Items</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="" title=""><img src="images/home/Bugatti-Chiron.jpg" alt="" /></a>
											<h2>650.000 d</h2>
											<a href="product-detail.php" title="">Bugatti-Chiron tỉ lệ 1:12</a>
											<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
								
							</div>
						</div>
						
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#autoart" data-toggle="tab">AUTOART</a></li>
								<li><a href="#bburago" data-toggle="tab">BBurago </a></li>
								<li><a href="#gtspirit" data-toggle="tab">GTSpirit</a></li>
								<li><a href="#frontiart-model" data-toggle="tab">Frontiart-Model</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="autoart" >
								<div class="col-sm-12">
									<div class="col-sm-4 text-center">
										<img src="images/brand/autoart.png" width="150" alt="">
									</div>
									<div class="col-sm-8">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>
								</div>														
							</div>
							
							<div class="tab-pane fade" id="bburago" >
								<div class="col-sm-12">
									<div class="col-sm-4 text-center">
										<img src="images/brand/bburago.png" width="150" alt="">
									</div>
									<div class="col-sm-8">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>
								</div>
								
							</div>
							
							<div class="tab-pane fade" id="gtspirit" >
								<div class="col-sm-12">
									<div class="col-sm-4 text-center">
										<img src="images/brand/gtspirit.png" width="150" alt="">
									</div>
									<div class="col-sm-8">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="frontiart-model" >
								<div class="col-sm-12">
									<div class="col-sm-4 text-center">
										<img src="images/brand/frontiart.jpg" width="150" alt="">
									</div>
									<div class="col-sm-8">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>
								</div>
								
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/Bugatti-Chiron.jpg" alt="" />
													<h2>650.000 d</h2>
													<a href="product-detail.php" title="">Bugatti-Chiron tỉ lệ 1:12</a>
													<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/Bugatti-Chiron.jpg" alt="" />
													<h2>650.000 d</h2>
													<a href="product-detail.php" title="">Bugatti-Chiron tỉ lệ 1:12</a>
													<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/Bugatti-Chiron.jpg" alt="" />
													<h2>650.000 d</h2>
													<a href="product-detail.php" title="">Bugatti-Chiron tỉ lệ 1:12</a>
													<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/Bugatti-Chiron.jpg" alt="" />
													<h2>650.000 d</h2>
													<a href="" title="">Bugatti-Chiron tỉ lệ 1:12</a>
													<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/Bugatti-Chiron.jpg" alt="" />
													<h2>650.000 d</h2>
													<a href="" title="">Bugatti-Chiron tỉ lệ 1:12</a>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/Bugatti-Chiron.jpg" alt="" />
													<h2>650.000 d</h2>
													<a href="" title="">Bugatti-Chiron tỉ lệ 1:12</a>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
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
</body>
</html>