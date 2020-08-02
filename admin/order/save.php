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
 <h2>Update Success</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>order?esuccess=true";
 	},1500);
 </script>