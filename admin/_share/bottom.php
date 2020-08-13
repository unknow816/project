<?php 

  require_once $path.'../common/common.php';

 ?>

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
	</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
	<script src="<?= $adminAsset  ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
	<script src="<?= $adminAsset  ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
	<script src="<?= $adminAsset  ?>plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
	<script src="<?= $adminAsset  ?>dist/js/adminlte.min.js"></script>

	<script src="<?= $siteUrl  ?>js/sweetalert.min.js"></script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.bm').click(function(e) {
			var Url = $(this).attr('data-href');
			$(this).attr('href', Url);
		});




		$("#myModal").on('show.bs.modal',function(e){
	      $(this).find("#send").attr('href',$(e.relatedTarget).data('href'));
	    });
	});
</script>

<script type="text/javascript">

    <?php if(isset($_COOKIE['success']) && $_COOKIE['success'] == 'true') { ?>

      swal({
          title : "Add success",
          icon : "success",
      });

    <?php } ?>

    <?php if(isset($_COOKIE['esuccess']) && $_COOKIE['esuccess'] == 'true') { ?>

      swal({
          title : "Edit success",
          icon : "success",
      });

    <?php } ?>

    <?php if(isset($_COOKIE['dsuccess']) && $_COOKIE['dsuccess'] == 'true') { ?>

      swal({
          title : "It has been deteled!",
          icon : "success",
      });

    <?php } ?>


  </script>