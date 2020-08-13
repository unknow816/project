<div class="edit pull-right">
	<a href="account.php?request=edit" title=""><span class="fa fa-edit"></span>Edit</a>
</div>	
<div class="row-info">
	<span class="title">Name:</span> 
	<span class="content"><?= $user['name'] ?></span>
</div>		
<div class="row-info">
	<span class="title">Email:</span> 
	<span class="content"><?= $user['email'] ?></span>
</div>				
<div class="row-info">
	<span class="title">Address:</span> 
	<span class="content"><?= $user['address'] == "" ? "Chưa có thông tin" : $user['address'] ?></span>
</div>				
<div class="row-info">
	<span class="title">Phone Number:</span> 
	<span class="content"><?= $user['phone'] == "" ? "Chưa có thông tin" : $user['phone'] ?></span>
</div>				
<div class="row-info">
	<span class="title">Gender:</span> 
	<span class="content">
		<?php 
			switch ($user['gender']) {
				case '1':
					echo "Nam";
					break;
				case '2':
					echo "Nu";
					break;
				default:
					echo "Chưa có thông tin";
					break;
			}
		?>
	</span>	
</div>