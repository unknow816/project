<?php 

	$sql = "select * from web_setting";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$web = $stmt->fetch();

	$cates = getdata('categories');


 ?>

<header id="header"><!--header-->	
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?= $siteUrl ?>index.php"><img src="<?= $siteUrl.$web['logo'] ?>" alt="" /></a>		
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="search_box pull-right">
							<form action="<?= $siteUrl ?>shop.php" method="get" accept-charset="utf-8">
								<input type="text" placeholder="Search" name="search">
								<button type="submit" class="btn btn-primary">Tìm kiếm</button>
							</form>

						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?= $siteUrl ?>index.php" class="active">Trang chủ</a></li>
								
								<li class="dropdown"><a href="<?= $siteUrl ?>shop.php">Sản phẩm
									<i class="fa fa-angle-down"></i></a>
									 <ul role="menu" class="sub-menu">
									   <?php foreach ($cates as $c) { ?>
                                        <li><a href="<?= $siteUrl ?>shop.php?cate_id=<?= $c['id'] ?>"><?= $c['name'] ?></a></li>
                                       <?php } ?>
                                    </ul>
								</li>
								
								<li><a href="<?= $siteUrl ?>contact.php">Liên hệ</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-6">
					
						<div class="mainmenu pull-right">
							<ul class="nav navbar-nav ">
                                <li><a href="<?= $siteUrl ?>cart"><i class="fa fa-shopping-cart rcart"></i> Giỏ hàng (<?php if(isset($_SESSION['cart']) ){
                                	echo count($_SESSION['cart']);
                                }else{ echo 0;} ?>)</a></li> 
							  <?php if(!isset($_SESSION['cuser'])) { ?>
								<li><a href="<?= $siteUrl ?>register.php"><i class="fa fa-user"></i> Đăng ký</a></li>
								<li><a href="<?= $siteUrl ?>login.php"><i class="fa fa-lock"></i> Đăng nhập</a></li>
							  <?php }else { ?>
								<li class="dropdown"><a href="#">Xin chao
									<img class="img" src="<?=$_SESSION['cuser']['avatar'] ?>">
								<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= $siteUrl ?>account.php">Cập nhật thông tin</a></li>
										<li><a href="<?= $siteUrl ?>history.php">Lịch sử giao dịch</a></li> 
										<li><a href="<?= $siteUrl ?>logout.php">Đăng xuất</a></li> 
                                    </ul>
                                </li> 
                               <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->