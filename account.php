<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Setting Account</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>
	
	<div class="container">
		<hr>
		<div class="row">
			
			<div class="avatar col-sm-12">
				<div class="pull-left">
					<img src="images/home/banner.jpg" class="img-thumbnail image">
				</div>
			</div>
			<div class="col-sm-8">
				<h1>Information Account</h1>
				<div class="box-info">
					<?php if(!isset($_GET['request'])){
						include_once './account/index.php';
					} elseif ($_GET['request'] == 'edit') {
						include_once './account/edit.php';
					}?>

				</div>
			</div>
		</div>
	</div>

	
	
	<?php include_once './_share/footer.php'; ?>
	

  
    <?php include_once './_share/bottom.php'; ?>
</body>
</html>