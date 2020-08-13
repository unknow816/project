<?php 

	require_once '../common/common.php';
	require_once '../common/function.php';

	$sessionValue = isset($_SESSION['cart']) == true ? $_SESSION['cart'] : "";

	// if($_SERVER['REQUEST_METHOD'] != 'POST'){
	// 	header('localhost:'.$siteUrl.'cart');
	// 	die;
	// }
		$order_id = addorder('orders',$_POST);
		

		foreach ($sessionValue as $value) {
			$sql = "insert into order_detail (order_id,pro_id,quantity,price) values("
											  .$order_id.",".
											  $value['id'].",".

											  $value['quantity'].",".
											  $value['price'].')';

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
		
		}





	// header('localhost:index.php');
		
		setcookie('tsuccess', 'true', time() + 2, "/");


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once '../_share/client.php'; ?>
</head><!--/head-->
<body class="text-center" >

  	<h2 style="margin: 350px 0;">Loading .....</h2>
	
</body>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $siteUrl ?>shop.php";
  },1500);
 </script>
</html>
