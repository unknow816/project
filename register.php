<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <?php include_once './_share/client.php'; ?>
</head><!--/head-->

<body>
	<?php include_once './_share/header.php'; ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h1>New User Signup!</h1>
						<form action="#" method="post">
							<input type="text" placeholder="Name"/>
							<input type="text" placeholder="Email Address"/>
							<input type="password" placeholder="Password"/>
							
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
						<a href="login.php" class="text-center">I have already a account.</a>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php include_once './_share/footer.php'; ?>
	

  
    <?php include_once './_share/bottom.php'; ?>
</body>
</html>