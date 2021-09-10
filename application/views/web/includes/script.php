<script type="text/javascript" src="<?= base_url();?>assets/web/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/bootsnav.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/parallax.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/scrollto.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/jquery.counterup.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/gallery.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/wow.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/slider.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/video-player.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/jquery.barfiller.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/timepicker.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/js/moment.min.js"></script>

<script type="text/javascript" src="<?= base_url();?>assets/web/ism/js/ism-2.2.min.js"></script>

<script type="text/javascript" src="<?= base_url();?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
<script src="<?= base_url();?>assets/js/jquery.toaster.js"></script>
<!-- <script type="text/javascript" src="<?= base_url();?>assets/web/js/tweetie.js"></script> -->
<!-- Google Map Javascript Codes -->
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= base_url();?>assets/web/js/googlemaps.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="<?= base_url();?>assets/web/js/script.js?ver=<?= time();?>"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/common.js?ver=<?= time();?>"></script>
<script type="text/javascript" src="<?= base_url();?>assets/web/lightbox/js/lightbox.js"></script>


<?php 
	if(isset($js)){
		load_js($js);
	}
	if(isset($pagename)){
	    $uniqu    = uniqid();
	    $dir      = realpath(dirname(__FILE__));
	    $path     = realpath($dir.'/../../../../').'/';
	    $filename = $path."assets/web/js/pages/".$pagename.".js";
	    $filename1= base_url()."assets/web/js/pages/".$pagename.".js?random=".$uniqu;
      	if (file_exists($filename)) {
     		echo '<script src="'.$filename1.'"></script>';
  		}
    }
?>
<div class="modal fade bs-example-modal-md" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="exampleModalLabel"><span class="flaticon-lock"></span> Login</h4>
	        </div>
	        <div class="modal-body">
	      		<div class="row">
					<form class="ulockd-login-form" method="POST" id="login-form" >
		      			<div class="col-sm-12 text-center ">
				        	<p>Enter username and password to login:</p>
				            <div class="form-group" name="test">
							    <input type="text" class="form-control" name="username" placeholder="Username">
							</div>
							<div class="form-group">
							    <input type="password" name="password" class="form-control" placeholder="Password">
							    <input type="hidden" name="client" value="cient">
							    <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
							</div>
							<button type="submit" class="btn btn-default ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default" id="userlogin" data-form="login-form">Login to account <i class="fa fa-save" style="display: none"></i></button>
						</div>
					</form>
				</div>
        	</div>
        	<div class="modal-footer">
				<div class="row">
					<div class="col-md-6 text-center">
						<a href="<?= base_url();?>forgot-password"><span class="float-md-left forgot">Forgot Password</span></a>
					</div>
					<div class="col-md-6 text-center">
						<a href="<?= base_url();?>alternative-login"><span class="float-md-left forgot">First Time Login</span></a>
					</div>
				
				</div>
        	</div>
        	<!-- modal footer start here-->
    	</div>
	</div>
</div>

</body>
</html>