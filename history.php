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
				<h1>History Order</h1>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">OrderID</td>
							<td class="description">Username</td>
							<td class="price">Total product</td>
							<td class="price">Total price</td>
							<td class="price">Created_at</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<p>1</p>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>								
							</td>
							<td class="cart_total_price">
								<p>0</p>
							</td>
							<td class="cart_total_price">
								<p>1.000.000 d</p>
							</td>					
							<td>
								<p>01/10/2020</p>
							</td>
							
							<td>
								<a class="#" href="">Xem chi tiet..</a>
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