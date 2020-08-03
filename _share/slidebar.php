<?php 

	$cates = getdata('categories');

	$brands = getdata('brands');

	$sql = "select * from banner where status = 0";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$ban = $stmt->fetch();


 ?>

<div class="left-sidebar">
						<div class="brands_products"><!--categories-->
							<h2>Loại sản phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								   <?php foreach ($cates as $c) { ?>

									<li>
										<h4> 
											<span class="pull-right">(<?= countdata('products','cate_id',$c['id']) ?>) </span>
											<a style="color: black;text-decoration:none;font-size: 17px;" href="<?= $siteUrl ?>shop.php?cate_id=<?= $c['id'] ?>"><?= $c['name'] ?></a> 
                                        </h4> 
                                    </li>
								   <?php } ?>
								</ul>
							</div>
						</div><!--/categories-->	
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								   <?php foreach ($brands as $b) { ?>

									<li>
										<h4> <span class="pull-right">(<?= countdata('products','brand_id',$b['id']) ?>)</span><a style="color: black;text-decoration:none;" href="<?= $siteUrl ?>shop.php?brand_id=<?= $b['id'] ?>"><?= $b['name'] ?></a> 
                                        </h4> 
                                    </li>
								   <?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?= $siteUrl.$ban['image']  ?>" alt="" />
						</div><!--/shipping-->
					
					</div>