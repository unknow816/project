<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<h2>List Cart</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price" width="150">Price</td>
							<td class="quantity" width="150">Quantity</td>
							<td class="total" width="150">Total</td>
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
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form id="form" action="" method="get" accept-charset="utf-8">					
									<span class="up" onclick="increase(+1)"> + </span>
										<input class="cart_quantity_input" type="text" name="quantity_input" value="1" autocomplete="off" size="2">
									<span class="down" onclick="decrease(1)"> - </span>

									<button type="button" class="btn btn-primary">Cap nhat</button>
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">

				<div class="col-sm-6">
					<div class="total_area">
						<form action="" method="post">
							
							<div class="form-group">
								<label>Name:</label>
								<input type="text" name="" value="" placeholder="" class="form-control">
							</div>
							<div class="form-group">
								<label>Phone:</label>
								<input type="text" name="" value="" placeholder="" class="form-control">
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input type="text" name="" value="" placeholder="" class="form-control">
							</div>
							<button type="submit" class="btn btn-default check_out">Check Out</button>
						</form>

						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include_once './_share/footer.php'; ?>
	


    <?php include_once './_share/bottom.php'; ?>
</body>
</html>