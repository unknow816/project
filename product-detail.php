<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Detail</title>

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
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/home/Bugatti-Chiron.jpg"  alt="" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information" ><!--/product-information-->
								
								<h2>Bugatti-Chiron tỉ lệ 1:12</h2>
								<p>Product ID: 1089772</p>
								
								<span>
									<span>650.000 d</span>
									<label>Quantity:</label>
									<input type="text" value="0" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Brand Profile</a></li>
								
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (0)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="row col-sm-10">
									<span class="tt col-sm-3">Thuong hieu</span>
									:<span class="nd">Ten thuong hieu</span>
								</div>
								<div class="row col-sm-10">
									<span class="tt col-sm-3">Ti le</span>
									:<span class="nd">Ti le san pham</span>
								</div>
								<div class="row col-sm-10">
									<span class="tt col-sm-3">Chat lieu</span>
									:<span class="nd">Chat lieu san pham</span>
								</div>
								<div class="row col-sm-10">
									<span class="tt col-sm-3">Kich thuoc</span>
									:<span class="nd">Kich thuoc san pham</span>
								</div>
								<div class="row col-sm-10">
									<span class="tt col-sm-3">Chuc nang</span>
									:<span class="nd">Chuc nang san pham</span>
								</div>
								<div class="row col-sm-10">
									<span class="tt col-sm-3">Bao bi</span>
									:<span class="nd">Bao bi san pham</span>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								thong tin company
							</div>
							
					
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">												
									<form action="#" method="post">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" placeholder="Your messages"></textarea>
										
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>

									<h2>Comments:</h2>
									<div class="cm">
										<div class="row">
											<div class="anh col-sm-2">
												<img src="images/default.jpg" alt="" class="av ">
											</div>
											<div class="nd col-sm-10">
											   <span class="tieude">Name</span>
											   <span class="gou">Guest or user</span>
											   <span class="time"><?= date("m/d/Y"); ?></span>
											   <p>Noi dung binh luan</p>
											</div>
										</div>


									</div>

								</div>
							</div>
							<!-- end tab-pane fade id reviews -->
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
								<div class="item">	
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