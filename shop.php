<?php 
	require_once './common/common.php';
	require_once './common/function.php';

	if(isset($_GET['search'])){
		$name = $_GET['search'];
		$sql = "select * from products where name like '%$name%'";
	}elseif(isset($_GET['cate_id'])){
		$id = $_GET['cate_id'];
		$sql = "select * from products where cate_id = $id";
	}elseif(isset($_GET['brand_id'])){
		$id = $_GET['brand_id'];
		$sql = "select * from products where brand_id = $id";
	}else{
		$sql = "select * from products ";
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
							<li><a href="">&laquo;</a></li>
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
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