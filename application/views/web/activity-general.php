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
                        <h2 class="text-uppercase">General Samiti</span></h2>
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
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/gen1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Convenor</h4>
                                <strong> Devchand Gagubhai Savla  </br>  
								    <a href="tel:+919324225684" target="_blank">+91 9324225684</a>
								    <a href="https://api.whatsapp.com/send?phone=+919324225684" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/gen2.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Co-Convenor</h4>
                                <strong> Manilal Premji Rambhia </br>  
								    <a href="tel:+919869576070" target="_blank">+91 9869576070</a>
								    <a href="https://api.whatsapp.com/send?phone=+919869576070" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/gen3.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Member</h4>
                                <strong> Manilal Ramji Maru </br>  
								    <a href="tel:+919821006361" target="_blank">+91 9821006361</a>
								    <a href="https://api.whatsapp.com/send?phone=+919821006361" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/gen4.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Member</h4>
                                <strong> Mukesh Kheraj Furia </br>  
								    <a href="tel:+919892313499" target="_blank">+91 9892313499</a>
								    <a href="https://api.whatsapp.com/send?phone=+919892313499" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-pd-content" style="text-align:justify">
                        <p class="project-dp-one">સ્થાનિક તથા મુંબઈના કાર્યો વાર્ષિક કાર્યક્રમ જેસલપીરની પહેડી સ્થાનિકે જીવદયાની પ્રવૃત્તિ તથા પ્રાથમિક સારવાર કેન્દ્રનું યોગ્ય રીતે સંચાલન થાય તેની દેખરેખ રાખવી. હજી પણ અન્ય જરૂરિયાતો છે તેને વહેલી તકે પૂરી પાડી શકાય તે દિશામાં નક્કર પગલા ભરવા</p>
                        <p class="project-dp-two">Local and Mumbai Functions Annual Program Jesalpir's Pahedi Sthanik Jeevadaya activity and primary care center to ensure proper management. There are still other needs to be addressed as soon as possible.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>