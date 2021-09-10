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
                        <h2 class="text-uppercase">Education Samiti</span></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-4 col-lg-3 ulockd-pdng0">
            <!--<h3>Education Donors</h3>
            <div id="cf4a">
                <div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 102px;"><div class="media testimonial-carousel" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, -107px, 0px);"><div class="media-left pull-left bx-clone" style="float: none; list-style: none; position: relative; width: 265px; margin-bottom: 5px;" aria-hidden="true">
                      <img class="media-object thumbnail bx-wrapper" src="<?= base_url();?>assets/web/images/testimonial/1.jpg">
                      <img class="img_animat media-object  thumbnail bx-wrapper" src="<?= base_url();?>assets/web/images/testimonial/2.jpg">
                    </div>
                    <div class="media-left pull-left" style="float: none; list-style: none; position: relative; width: 265px; margin-bottom: 5px;" aria-hidden="false">
                      <img class="media-object thumbnail bx-wrapper" src="<?= base_url();?>assets/web/images/testimonial/1.jpg">
                      <img class="img_animat media-object  thumbnail bx-wrapper" src="<?= base_url();?>assets/web/images/testimonial/2.jpg">
                    </div>
                <div class="media-left pull-left bx-clone" style="float: none; list-style: none; position: relative; width: 265px; margin-bottom: 5px;" aria-hidden="true">
                      <img class="media-object thumbnail bx-wrapper" src="<?= base_url();?>assets/web/images/testimonial/1.jpg">
                      <img class="img_animat media-object  thumbnail bx-wrapper" src="<?= base_url();?>assets/web/images/testimonial/2.jpg">
                    </div></div></div><div class="bx-controls"></div></div>
            </div>-->
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
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/edu1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Convenor</h4>
                                <strong> Mahesh Vasanji Maru </br>  
								    <a href="tel:+919820419340" target="_blank">+91 9820419340</a>
								    <a href="https://api.whatsapp.com/send?phone=+919820419340" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/edu2.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Co-Convenor</h4>
                                <strong> Raju Liladhar Savla </br>  
								    <a href="tel:+919769766768" target="_blank">+91 9769766768</a>
								    <a href="https://api.whatsapp.com/send?phone=+919769766768" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-pd-content" style="text-align:justify">
                        <p class="project-dp-one">શિક્ષણ ક્ષેત્રે વિવિધ આયોજનો કરી આજના યુવાનોને દેશ વિદેશની ટેકનોલોજી પ્રત્યે સજાગ કરી વિદ્યાર્થીઓને આગળ વધવામાં જરૂરી માર્ગદર્શન. આગળ વધવા માટે ઉત્સાહ વધારી ગામ નું શિક્ષણ સ્તર ઉંચું લાવવાની કોશિશ કરવી. </p>
                        <p class="project-dp-two">By making various plans in the field of education, by making today's youth aware of the technology of the country and abroad, necessary guidance for the students to move forward. Encouragement to move forward and try to raise the level of education in the village.<p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>