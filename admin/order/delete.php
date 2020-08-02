<?php
	$path = "../";
	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];		
	}else{
		header('location:'.$adminUrl.'order');
	}

	$sql = "delete from orders where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
?>
 <h2>Delete Success Loading.....</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>order?dsuccess=true";
 	},1500);
 </script>