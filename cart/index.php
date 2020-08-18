<?php 

	require_once '../common/common.php';
	require_once '../common/function.php';

	$sessionValue = isset($_SESSION['cart']) == true ? $_SESSION['cart'] : "";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once '../_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once '../_share/header.php'; ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<h2>List Cart</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" width="250">Ảnh</td>
							<td class="description">Tên</td>
							<td class="price" width="150">Giá</td>
							<td class="quantity" width="150">Số lượng</td>
							<td class="total" width="150">Tổng</td>
							<td>Xóa</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$total = 0;
							$total_product = 0;
							if(count($sessionValue)){
								foreach ($sessionValue as $value) {
									$total += $value['quantity'] * $value['price'];
								}
								foreach ($sessionValue as $pc) {
						 ?>
						<tr>
							<td class="">
								<a href=""><img style="width: 100%;"src="<?=$siteUrl.$pc['image'] ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="<?= $siteUrl ?>product-detail.php?id=<?= $pc['id'] ?>"><?= $pc['name'] ?></a></h4>
								<p>ID: <?= $pc['id'] ?></p>
							</td>
							<td class="cart_price">
								<p><?= number_format($pc['price'],0,"",","); ?> đ</p>

							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form id="form" action="edit.php" method="get" accept-charset="utf-8">				<input type="hidden" name="id" value="<?=$pc['id']?>">	
										<span class="up"><a href="add.php?id=<?=$pc['id'] ?>"> + </a></span>
											<input class="cart_quantity_input" type="text" id="<?=$pc['id'] ?>" name="num" value="<?=$pc['quantity']?>" size="2">
										<span class="down"><a href="remove.php?id=<?=$pc['id'] ?>"> - </a></span>

										<button type="submit" class="btn btn-primary">Cap nhat</button>
									</form>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?= number_format($pc['quantity']*$pc['price'],0,"",",") ;?> đ</p>
							</td>
							<td class="text-center">
								<a class="cart_quantity_delete" style="font-size: 25px;display: block;background: #cccccc;border-radius: 5px;" href="<?=$siteUrl?>cart/delete.php?id=<?=$pc['id']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
							$total_product += $pc['quantity'];	}
							}
						 ?>
						
					</tbody>
					<tfoot>
						<tr class="cart_menu">
							<td class="total" colspan="4"><h3>Tổng số tiền</h3></td>
							<td colspan="2"><h3><?= number_format($total,0,"",",") ;?> đ</h3></td>
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
							<form action="submit-order.php" method="post">
								
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


								<input type="hidden" name="total_product" value="<?= $total_product ?>">
								<input type="hidden" name="total_price" value="<?=$total ?>">
								<input type="hidden" name="status" value="0">
								<input type="hidden" name="created_at" value="<?= date("Y/m/d") ?>">

								<button type="submit" class="btn btn-default check_out">Check Out</button>
							</form>
						<?php }else{ ?>
							<form action="submit-order.php" method="post">

								<input type="hidden" name="created_at" value="<?= date("Y/m/d") ?>">
								<button type="submit" name="check" class="btn btn-default check_out">Check Out</button>
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include_once '../_share/footer.php'; ?>
	


    <?php include_once '../_share/bottom.php'; ?>

 
</body>
</html>