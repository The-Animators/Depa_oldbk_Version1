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

<!-- Inner Pages Main Section -->
<section class="ulockd-service-details" <?= $padding ?? '';?>>
    <div class="<?= $container ?? 'container'; ?>">
        <div class="col-md-4 col-lg-3 ulockd-pdng0">
            <h3>Others Donors</h3>
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
            </div>
            <h3>Co-ordinators</h3>
            <div class="ulockd-all-service">
                <div class="list-group">
                    <div class="list-group-item media">
                        <div class="media-left pull-left">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/testimonial/1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Ana Andreea</h4>
                                <strong> +91 2863657987</strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/testimonial/1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Ana Andreea</h4>
                                <strong> +91 2863657987</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-pd-content">
                        <h3>Deepa Others Group</h3>
                        <p class="project-dp-one">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which</p>
                        <p class="project-dp-two">toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>