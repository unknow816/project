<?php 

	require_once './common/common.php';
	require_once './common/function.php';

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 ">
					<div class="login-form"><!--login form-->
						<h1>Login to your account</h1>
						<form action="post-login.php" method="post">
							<input type="text" name="email" placeholder="Email" />
							<?php if(isset($_SESSION['emailerror'])) : ?>
								<span class="text-danger"><?= $_SESSION['emailerror'] ?></span>
							<?php endif ?>
							<input type="password" name="password" placeholder="Password" />
							<?php if(isset($_SESSION['passworderror'])) : ?>
								<span class="text-danger"><?= $_SESSION['passworderror'] ?></span>
							<?php endif ?>
							<br>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<a href="register.php" class="text-center">Register a new membership</a>
					</div><!--/login form-->
				</div>

				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php include_once './_share/footer.php'; ?>
	

  
    <?php include_once './_share/bottom.php'; ?>
</body>
</html>