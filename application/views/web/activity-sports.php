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
                        <h2 class="text-uppercase">Sports Samiti</span></h2>
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
            <div class="ulockd-all-service">
                <div class="list-group">
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/sport1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Convenor</h4>
                                <strong> Punit Dhanji Mamania </br> 
								    <a href="tel:+919322210566" target="_blank">+91 9322210566</a>
								    <a href="https://api.whatsapp.com/send?phone=+919322210566" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/sport2.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Co-Convenor</h4>
                                <strong> Ritesh Chunilal Chheda </br> 
								    <a href="tel:+919820461362" target="_blank">+91 9820461362</a>
								    <a href="https://api.whatsapp.com/send?phone=+919820461362" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/sport3.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Member</h4>
                                <strong> Geeta Nitesh Savla </br> 
								    <a href="tel:+919769528777" target="_blank">+91 9769528777</a>
								    <a href="https://api.whatsapp.com/send?phone=+919769528777" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/sport4.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Member</h4>
                                <strong> Jeeta Kiran Maru </br> 
								    <a href="tel:+919821061624" target="_blank">+91 9821061624</a>
								    <a href="https://api.whatsapp.com/send?phone=+919821061624" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-pd-content" style="text-align:justify">
                        <p class="project-dp-one">ગામના રમતવીરોને સમાજ લેવલ પર ચાલતી વિવિધ ટુર્નામેન્ટમાં ભાવ લેવા પ્રોત્સાહિત કરવા ટેલેન્ટને આગળ વધવા સ્ટેટ લેવલ પર લઈ જવા માટેના પ્રયત્નો કરવા.</p>
                        <p class="project-dp-two">To make efforts to take the talent to the state level to move forward to encourage the village sportspersons to take the price in various tournaments running at the social level.<p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>