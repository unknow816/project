<?php 

	$path = '../';

	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST' ){
		header('location:'.$adminUrl.'order');
		die;
	}

	$id = $_POST['id'];
	$status = $_POST['status'];


	$sql = "update orders set status = $status ";

    
    $sql .= " where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	//echo $sql;

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
    window.location.href = "<?= $adminUrl ?>order";
  },1500);
 </script>
</html>