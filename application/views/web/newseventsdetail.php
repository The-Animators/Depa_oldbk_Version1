<!-- Home Design Inner Pages -->
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
<input type="hidden" id="eventid" value="<?= $this->uri->segment(3);?>">
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb1');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase" class="eventtitle"></span></h2>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <figure class="upcoming-event single">
                    <div class="caption">
                        <img class="img-responsive img-whp" id="eve_img" src="" alt="">
                        <div class="event-details">
                            <h3 class="event-title ulockd-mrgn1260 text-uppercase eventtitle" id="title">
                                News & Event Name
                                <!--<span class="pull-left" id="title"></span>-->
                            </h3>                  
                            <h4 id="evedate"></h4><br> 
                            <div id="eve_description" style="text-align:justify"></div><br> 
                            <div id="links"></div>
                        </div>
                    </div>
                </figure>
            </div>
		<!--	
            <div class="col-md-4">
                <h3 class="ulockd-bb-dashed"><span class="text-thm1"></span> <i class="fa fa-user"></i> Contact Person</h3>
                <div class="ulockd-lp">
                    <div class="ulockd-latest-post">
                        <div class="media">
                            <div class="media-left pull-left">
                                <a href="#">
                                    <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/testimonial/1.jpg" alt="1.jpg">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Ana Andreea</h4>
                                I have constantly believed Be aHand to take care of their patain <a href="#">more...</a>
                                <strong><a href="#"> 20 Jan 2017 </a></strong>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-latest-post">
                        <div class="media">
                            <div class="media-left pull-left">
                                <a href="#">
                                    <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/testimonial/2.jpg" alt="2.jpg">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Simone Andreea</h4>
                                I have constantly believed Be aHand to take care of their patain <a href="#">more...</a>
                                <strong><a href="#"> 20 Jan 2017 </a></strong>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-latest-post">
                        <div class="media">
                            <div class="media-left pull-left">
                                <a href="#">
                                    <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/testimonial/3.jpg" alt="3.jpg">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Devid Andreea</h4>
                                I have constantly believed Mr Fix to take care of busines <a href="#">more...</a>
                                <strong><a href="#"> 20 Jan 2017 </a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->        </div>
    </div>
</section>