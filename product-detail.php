<?php 

	require_once './common/common.php';
	require_once './common/function.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "select * from products where id = $id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$product = $stmt->fetch();
	}

	$comments = getdatadesc('comments',$id,'id');


	$cate_id = $product['cate_id'];
	$sql = "select * from products where cate_id = $cate_id limit 0,3";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$ps = $stmt->fetchAll();

	$sql = "select * from products where cate_id = $cate_id limit 3,3";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$ps2 = $stmt->fetchAll();

?><!DOCTYPE html>
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
								<img src="<?= $siteUrl.$product['image'] ?>"  alt="" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information" ><!--/product-information-->
								
								<h2><?= $product['name'] ?></h2>
								<p>Product ID: <?= $product['id'] ?></p>
									<span class="price"><?= number_format($product['price'],0,"",",") ?> đ</span>
									<div class="cart_quantity_button">
										<form style="margin-top:60px;margin-bottom: 0px;" id="form" action="" method="get" accept-charset="utf-8">					
											<a class="up" onclick="increase(+1)">+</a>
											<input class="cart_quantity_input" type="text" name="num" value="1" size="2">
											<a class="down" onclick="decrease(1)">-</a>
											<button type="button" class="btn btn-fefault cart" onclick="addcart(<?=$product['id'] ?>)" ><i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>										
										</form>
									</div>										
								<p><b>Tình trạng:</b> <?= $product['status'] == 0 ? "Còn hàng" : "Tạm hết"  ?></p>								
								<p><b>Thương hiệu:</b> <span style="font-size: 20px;"><?= getname($product['brand_id'],'brands') ?></span></p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Thông tin chi tiết</a></li>
								
								<li class="active"><a href="#reviews" data-toggle="tab">Bình luận (<?= count($comments) ?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="row col-sm-12">
									<span class="tt col-sm-3">Tỉ lệ</span>
									:<span class="nd"><?= getname($product['cate_id'],'categories') ?></span>
								</div>
								<div class="row col-sm-12">
									<span class="tt col-sm-3">Kích thước</span>
									:<span class="nd"><?= $product['size'] ?></span>
								</div>
								<div class="row col-sm-12">
									<span class="tt col-sm-3">Chức năng</span>
									:<span class="nd"><?= $product['function'] ?></span>
								</div>
								<div class="row col-sm-12">
									<span class="tt col-sm-3">Bao bì</span>
									:<span class="nd"><?= $product['package'] ?></span>
								</div>
							</div>
							
							<div class="tab-pane fade text-center" id="companyprofile" >
								<p><?php if(strlen($product['detail']) == 0)
								{ ?>
									<span style="font-size: 25px;">Chưa có thông tin</span>
								<?php 
									} else{ echo $product['detail'];};
								?>
								 </p>
							</div>
							
					
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">												
									<form action="<?= $siteUrl ?>submit-comment.php" method="post">
										<input type="hidden" name="pro_id" value="<?= $id ?>">
										<span>
														
											<input type="text" name="name" placeholder="Your Name"/>

											<input type="text" name="email" placeholder="Email Address"/>
											<?php if(isset($_SESSION['nameerror'])) : ?>
												<span class="text-danger"><?= $_SESSION['nameerror'] ?></span>
											<?php endif ?>
											<?php if(isset($_SESSION['emailerror'])) : ?>
												<span class="text-danger"><?= $_SESSION['emailerror'] ?></span>
											<?php endif ?>
											
										</span>
										<textarea name="content" placeholder="Your messages"></textarea>
										<?php if(isset($_SESSION['contenterror'])) : ?>
											<span class="text-danger"><?= $_SESSION['contenterror'] ?></span>
										<?php endif ?>
										<input type="hidden" name="created_at" value="<?= date("Y/m/d h:i:s") ?>">
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>

									<h2>Comments:</h2>
									<div class="cm">
										<?php foreach ($comments as $c) { ?>
										<div class="row">
											<div class="anh col-sm-2">
												<img src="images/default.jpg" alt="" class="av ">
											</div>
											<div class="nd col-sm-10">
											   <span class="tieude"><?= $c['name'] ?></span>
											   <span class="gou"><?php 
											   		if(check('users','email',$c['email']) == true){
											   			echo "Thành viên";
											   		}else{
											   			echo "Khách";
											   		}

											    ?></span>
											   <span class="time"><?= setdate($c['created_at']); ?></span>
											   <p><?= $c['content'] ?></p>
											</div>
										</div>
										<?php } ?>

									</div>

								</div>
							</div>
							<!-- end tab-pane fade id reviews -->
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php foreach ($ps as $p) { ?>
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

								</div>
								<div class="item">	
									<?php foreach ($ps2 as $p) { ?>
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
    		var num = $('.cart_quantity_input').val();
    		$.get('<?=$siteUrl ?>cart/add.php?id='+n+'&num='+num, function(data) {
    			
    			$('body').load('<?=$siteUrl ?>product-detail.php?id='+n);
    		});

    	};

    	

    </script>
</body>
</html>