<?php 

	require_once './common/common.php';
	require_once './common/function.php';

	$sessionUser = isset($_SESSION['cuser']) == true ? $_SESSION['cuser'] : "";
	$email = $sessionUser['email'];
	$sql = "select * from orders where email = '$email'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$order_ids = $stmt->fetchAll();

	// echo "<pre>";
	// var_dump($order_id);
	// echo "</pre>";
	// echo $sql;
 ?>
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
							<td class="price">Total product</td>
							<td class="price">Total price</td>
							<td class="price">Created_at</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($order_ids as $o) { ?>
						<tr>
							<td class="cart_product">
								<p><?= $o['id'] ?></p>
							</td>
							<td class="cart_total_price">
								<p><?= $o['total_product'] ?></p>
							</td>
							<td class="cart_total_price">
								<p><?= number_format($o['total_price'],0,"",","); ?> d</p>
							</td>					
							<td>
								<p><?= $o['created_at'] ?></p>
							</td>
							
							<td>
								<a class="" href="<?= $siteUrl ?>history-detail.php?id=<?=$o['id']?>">Xem chi tiet..</a>
							</td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	<?php include_once './_share/footer.php'; ?>
	


    <?php include_once './_share/bottom.php'; ?>
</body>
</html>