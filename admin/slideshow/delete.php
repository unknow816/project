<?php
	$path = "../";
	require_once $path.$path.'common/common.php';
	require_once $path.$path.'common/function.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];		
	}else{
		header('location:'.$adminUrl.'slideshow');
		die;
	}

	$sql = "delete from slideshows where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
?>
 <h2>Delete Success Loading.....</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>slideshow?dsuccess=true";
 	},1500);
 </script>