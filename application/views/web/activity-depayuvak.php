<!-- Home Design Inner Pages -->
<?php 
    if($client == 'web'){
?>
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"><?= $pagetitle;?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $this->load->view('web/includes/breadcrumb');
}?>
<!-- Home Design Inner Pages -->
<style>
    .ulockd-all-service a {
        padding: 3px !important;
    }
</style>

<!-- Inner Pages Main Section -->
<section class="ulockd-service-details" <?= $padding ?? '';?>>
    <div class="<?= $container ?? 'container'; ?>">
        <?php if($client == 'web'){ ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    <div class="ulockd-dtitle hvr-float-shadow">
                        <h2 class="text-uppercase">Depa Yuvak Mandal</span></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-4 col-lg-3 ulockd-pdng0">
            <h3>Donors</h3>
            <div id="cf4a">
                <div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 102px;"><div class="media testimonial-carousel" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, -107px, 0px);">
				<h3>COMING SOON...!</h3>
				</div></div><div class="bx-controls"></div></div>
            </div>
			
            <h3>Co-ordinators</h3>
            <div style="display:none" class="ulockd-all-service">
                <div class="list-group">
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/yuvak/y1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Founder</h4>
                                <strong> Shantilal Dungarshi Maru</br>
								    <a href="tel:+919821074100" target="_blank">+91 9821074100</a>
								    <a href="https://api.whatsapp.com/send?phone=+919821074100" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/yuvak/y2.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">President</h4>
                                <strong> Mahesh Vasanji Maru</br>
								    <a href="tel:+919821074100" target="_blank">+91 9821074100</a>
								    <a href="https://api.whatsapp.com/send?phone=+919821074100" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/yuvak/y3.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Vice President</h4>
                                <strong> Nitin Lakhamshi Rambhiya  </br>
								    <a href="tel:+919322241318" target="_blank">+91 9322241318</a>
								    <a href="https://api.whatsapp.com/send?phone=+919322241318" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-pd-content">
                        <p class="project-dp-one"></p>
                        <p class="project-dp-two">With a sole aim to provide finest education & social values to our society,<p>
                    </div>
                </div>
            </div>

        </div>
		
		<!-- <div class="md-padding" style="padding-bottom:30px;">
										
					<div class="container">
						
						<div class="heading style3" style="display:block;">
									<h3 class="uppercase"><span class="main-color"></span></h3>
									<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">હોદ્દેદારો </h3>
	              </div>
	              <div class="panel-body">

						<div class="row">
							<div class="col-md-4">
								<div class="team-box box-4" style="padding-left:40px;padding-right:40px;">
									<div class="team-img">
										<img alt="" src="assets/web/images/about/c3.jpg">
									</div>
									<div class="team-details t-center">
										<h4 class="team-name">
											Shri Shantilal Dungarshi Maru <br>
											<span class="main-color" style="font-size:18px;">Founder
 </span><br>
											+91 98210 74100
										</h4>
									</div>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="team-box box-4" style="padding-left:40px;padding-right:40px;">
									<div class="team-img">
										<img alt="" src="assets/web/images/about/c8.jpg">
									</div>
									<div class="team-details t-center">
										<h4 class="team-name">
											Shri Mahesh Vasanji Maru<br>
											<span class="main-color" style="font-size:18px;">President</span><br>
											+91 98204 19340
										</h4>
									</div>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="team-box box-4" style="padding-left:40px;padding-right:40px;">
									<div class="team-img">
										<img alt="" src="assets/web/images/activity/yuvak/y3.jpg">
									</div>
									<div class="team-details t-center">
										<h4 class="team-name">
											Shri Nitin Lakhamshi Rambhiya <br>
											<span class="main-color" style="font-size:18px;">Vice President
 </span><br>
											+91 9322241318
										</h4>
									</div>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="team-box box-4" style="padding-left:20px;padding-right:20px;">
									<div class="team-img">
										<img alt="" src="assets/web/images/about/c4.jpg">
									</div>
									<div class="team-details t-center">
										<h4 class="team-name">
											Shri Bhavanji Karamshi Mamaniya <br>
											<span class="main-color" style="font-size:18px;">Managing Trustee
 </span><br>
											98193 399990
										</h4>
									</div>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="team-box box-4" style="padding-left:40px;padding-right:40px;">
									<div class="team-img">
										<img alt="" src="assets/web/images/about/c5.jpg">
									</div>
									<div class="team-details t-center">
										<h4 class="team-name">
											Shri Manilal Premji Rambhiya <br>
											<span class="main-color" style="font-size:18px;">Managing Trustee
 </span><br>
											98695 76070
										</h4>
									</div>
									
								</div>
							</div>
						 </div>
						 <div class="row" style="margin-top:2%;">
							<div class="col-md-4">
								<div class="team-box box-4" style="padding-left:40px;padding-right:40px;">
									<div class="team-img">
										<img alt="" src="assets/web/images/about/c6.jpg">
									</div>
									<div class="team-details t-center">
										<h4 class="team-name">
											Shri Tushar Nanji Chheda<br>
											<span class="main-color" style="font-size:18px;">મંત્રીશ્રી </span><br>
											મો.૯૦૯૯૦૨૪૬૨૮
										</h4>
									</div>
									
								</div>
							</div>
						</div>
						</div>
						</div>
						</div>
					</div>
				</div>
				-->
    </div>
</section>