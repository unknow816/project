    <script src="<?= $siteUrl ?>js/jquery.js"></script>
	<script src="<?= $siteUrl ?>js/bootstrap.min.js"></script>
	<script src="<?= $siteUrl ?>js/jquery.scrollUp.min.js"></script>
	<script src="<?= $siteUrl ?>js/price-range.js"></script>
    <script src="<?= $siteUrl ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?= $siteUrl ?>js/main.js"></script>
    <script src="<?= $siteUrl ?>js/customjs.js"></script>
    <script src="<?= $siteUrl ?>js/sweetalert.min.js"></script>
    <script type="text/javascript">

	    <?php if(isset($_COOKIE['tsuccess']) && $_COOKIE['tsuccess'] == 'true') { ?>

	      swal({
	          title : "Thank you for donate Fshop",
	          icon : "success",
	      });

	    <?php } ?>

	    <?php if(isset($_COOKIE['esuccess']) && $_COOKIE['esuccess'] == 'true') { ?>

	      swal({
	          title : "Update your account infonation is Success ",
	          icon : "success",
	      });

	    <?php } ?>

	    <?php if(isset($_COOKIE['asuccess']) && $_COOKIE['asuccess'] == 'true') { ?>

	    	swal({
	    		title : "Success ",
	    		icon : "success",
	    	});

	    <?php } ?>

  </script>

