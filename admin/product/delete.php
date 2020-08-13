<?php 
	$path = "../";
	require_once $path.$path.'common/common.php';


	$id = $_GET['id'];

	$sql = "delete from products where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	setcookie('dsuccess', 'true', time() + 2, "/");
 ?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <?php include_once $path.$path.'_share/client.php'; ?>
</head><!--/head-->
<body class="text-center" >

    <h2 style="margin: 350px 0;">Loading .....</h2>
  
</body>
 <script type="text/javascript">
  setTimeout(function(){
    window.location.href = "<?= $adminUrl ?>product";
  },1500);
 </script>
</html>