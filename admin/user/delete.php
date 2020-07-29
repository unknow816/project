<?php 

	$path = "../";
	require_once $path.$path.'common/common.php';

	if($_SERVER['REQUEST_METHOD'] != 'GET'){
		header('location:'.$adminUrl.'user');
		die;
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];		
	}else{
		header('location:'.$adminUrl.'user');
	}

	$sql = "delete from users where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

 ?>
 <h2>Delete Success Loading.....</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>user?dsuccess=true";
 	},1500);
 </script>