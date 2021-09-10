<!-- Jquery Core Js --> 
<script src="<?= base_url();?>assets/admin/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="<?= base_url();?>assets/admin/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="<?= base_url();?>assets/js/common.js"></script><!-- Custom Js -->
<script src="<?= base_url();?>assets/js/jquery.toaster.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?= base_url();?>assets/admin/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url();?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>


<?php
if(!isset($mainscript)){?>
	<script src="<?= base_url();?>assets/admin/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<?php }
	if(isset($js)){
		load_js($js);
	}
	if(isset($pagename)){
	    $uniqu    = uniqid();
	    $dir      = realpath(dirname(__FILE__));
	    $path     = realpath($dir.'/../../../../').'/';
	    $filename = $path."assets/admin/js/".$pagename.".js";
	    $filename1= base_url()."assets/admin/js/".$pagename.".js?random=".$uniqu;
      	if (file_exists($filename)) {
     		echo '<script src="'.$filename1.'"></script>';
  		}
    }
?>
</body>
<script>
$(".mmenu").on("click",function(){$(".sidebar").toggleClass("open")})
</script>
</html>