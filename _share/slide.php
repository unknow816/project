<?php 

	$sql = "select * from slideshows order by order_num and status = 0";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$slides = $stmt->fetchAll();

?>

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					  <!-- Lặp vòng for với điều kiện là hiển thị tên class là active -->
					  <?php for ($i=0; $i < count($slides); $i++) { 
					  		$act = $i == 0 ? "active" : "";
					   ?>
						<li data-target="#slider-carousel" data-slide-to="$i" class="<?= $act ?>"></li>
					  <?php } ?>
					</ol>

					<div class="carousel-inner">
					   <?php $count = 0 ?>
					   <?php foreach ($slides as $s) { 
					   		$active = $count == 0 ? "active" : "";
					   	?>
						<div class="item <?= $active ?>">
							<div class="col-sm-6">
								<h1><span>F</span>-shop</h1>
								<h2><?= $s['name'] ?></h2>
								<p><?= $s['detail']?></p>
								<a href="<?= $siteUrl ?>shop.php" class="btn btn-default get"title="">Xem thêm..</a>
							</div>
							<div class="col-sm-6">
								<img src="<?=$siteUrl.$s['image'] ?>" class="girl img-thumbnail" alt="" />

							</div>
						</div>
					   <?php $count++; ?>
					   <?php } ?>
						<!-- end item -->
			

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
	</section><!--/slider-->