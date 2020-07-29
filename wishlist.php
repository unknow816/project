<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wishlist</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>

	<section id="cart_items">
		<div class="container">
			<div class="td">
				<h1>Wishlist</h1>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	<?php include_once './_share/footer.php'; ?>
	


    <?php include_once './_share/bottom.php'; ?>
</body>
</html>