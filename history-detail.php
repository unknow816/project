<?php 

	require_once './common/common.php';
	require_once './common/function.php';

	$sessionUser = isset($_SESSION['cuser']) == true ? $_SESSION['cuser'] : "";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:history.php');
		die;
	}
	// $email = $sessionUser['email'];
	$sql = "select pro_id from order_detail where order_id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$pro_ids = $stmt->fetchAll();

	// echo "<pre>";
	// var_dump($pro_ids);
	// echo "</pre>";
	// echo $sql;
	$mang = [];
	foreach ($pro_ids as $key => $value) {
		$idp = $value['pro_id'];
		$sql = "select products.id,products.name,products.price,products.image,order_detail.quantity from products INNER JOIN order_detail on products.id = order_detail.pro_id where products.id = $idp and order_detail.order_id = $id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$pro = $stmt->fetch();
		array_push($mang, $pro);
	}
	// echo "<pre>";
	// var_dump($mang);
	// echo "</pre>";
	// die;
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
				<h1>History Order<a href="<?=$siteUrl ?>history.php" class="btn btn-danger pull-right">Back</a></h1>

			</div>
			<div class="table-responsive cart_info">
				<table class="table table-hover table-bordered">
					<thead class="text-center">
						<tr class="cart_menu">
							<td class="">Product_ID</td>
							<td class="description">Name</td>
							<td class="price">Image</td>
							<td class="price">Price</td>
							<td class="price">Quantity</td>
							<td>Total</td>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php foreach ($mang as $p) { ?>
						<tr>
							<td class="">
								<?= $p['id'] ?>
							</td>
							<td class="cart_description">
								<h4><?= $p['name'] ?></h4>								
							</td>
							<td class="cart_total_price">
								<img width="200" src="<?= $siteUrl.$p['image'] ?>" alt="">
							</td>
							<td class="cart_total_price">
								<?= number_format($p['price'],0,"",","); ?> d
							</td>					
							<td class="cart_total_price">
								<?= $p['quantity']; ?>
							</td>
							<td class="cart_total_price">
								<?= number_format($p['price']*$p['quantity'],0,"",","); ?> d
							</td>
							
							
						</tr>
						<?php } ?>
						
					</tbody>
				</table>

				<!-- <a href="<?=$siteUrl ?>history.php" class="btn btn-primary">Back</a> -->
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	<?php include_once './_share/footer.php'; ?>
	


    <?php include_once './_share/bottom.php'; ?>
</body>
</html>