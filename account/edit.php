<?php 



	// if($user == true){
	// 	echo "HI";
	// }

 ?>

<form action="account/save-edit.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $user['id'] ?>">
	<div class="form-group">
		<label>Name:</label>
		<input type="text" name="name" value="<?= $user['name'] ?>" placeholder="" class="form-control">
	</div>
	<div class="form-group">
		<label>Email:</label>
		<input type="text" name="email" value="<?= $user['email'] ?>" placeholder="" class="form-control">
	</div>
	<div class="form-group">
		<label>Edit Password:</label>
		<input type="password" name="password" value="" placeholder="" class="form-control">
	</div>
	<div class="form-group">
		<label>Address:</label>
		<input type="text" name="address" value="<?= $user['address'] ?>" placeholder="" class="form-control">
	</div>
	<div class="form-group">
		<label>Phone Number:</label>
		<input type="text" name="phone" value="<?= $user['phone'] ?>" placeholder="" class="form-control">
	</div>
	<div class="form-group">
		<label>Gender:</label>
		<select name="gender" class="form-control">
			<option value=""></option>
			<option <?php if ($user['gender'] == 1) echo "selected";  ?> value="1">Nam</option>
			<option <?php if ($user['gender'] == 2) echo "selected";  ?> value="2">Nu</option>
		</select> 
	</div>
	<div class="form-group">
		<label>Avatar:</label>
		<input type="file" name="avatar" value="" placeholder="">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Update</button>
		<a href="account.php" title="" class="btn btn-danger">Cancer</a>
	</div>
</form>