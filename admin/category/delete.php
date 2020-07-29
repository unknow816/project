<?php 
	$path = "../";
	require_once $path.$path.'common/common.php';


	$id = $_GET['id'];

	$sql = "delete from categories where id = $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


 ?>
 
 <h2>Delete Success Loading.....</h2>
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = "<?= $adminUrl ?>category?dsucces=true";
 	},1500);
 </script>