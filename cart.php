<?php 

	require_once './common/common.php';
	require_once './common/function.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];

	}



?>
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
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price" width="150">Giá</td>
							<td class="quantity" width="150">Số lượng</td>
							<td class="total" width="150">Tổng</td>
							<td>Xóa</td>
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
								<p>600,000 đ</p>
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
								<p class="cart_total_price">600,000 đ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
					</tbody>
					<tfoot>
						<tr class="cart_menu">
							<td class="total" colspan="4">Tổng số tiền</td>
							<td colspan="2">0 đ</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">

				<div class="col-sm-6">
					<div class="total_area">
						<?php if(!isset($_SESSION['cuser'])){ ?>
							<h3>Hãy điền thông tin của bạn</h3>		
							<form action="" method="post">
								
								<div class="form-group">
									<label>Tên:</label>
									<input type="text" name="name" placeholder="Họ và tên" class="form-control">
								</div>
								<div class="form-group">
									<label>Email:</label>
									<input type="text" name="email" placeholder="vd:vidu8@gmail.com" class="form-control">
								</div>
								<div class="form-group">
									<label>Số điện thoại:</label>
									<input type="text" name="phone" placeholder="0234567897" class="form-control">
								</div>
								<div class="form-group">
									<label>Địa chỉ:</label>
									<input type="text" name="address" placeholder="Cao bằng" class="form-control">
								</div>
								<button type="submit" class="btn btn-default check_out">Check Out</button>
							</form>
						<?php }else{ ?>
							<form action="" method="post">
								<button type="submit" name="check" class="btn btn-default check_out">Check Out</button>
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include_once './_share/footer.php'; ?>
	


    <?php include_once './_share/bottom.php'; ?>
</body>
</html>