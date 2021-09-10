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
                        <h2 class="text-uppercase">Medical Samiti</span></h2>
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
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/medi1.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Convenor</h4>
                                <strong> Shantilal Dungarshi Maru </br> 
								    <a href="tel:+919821074100" target="_blank">+91 9821074100</a>
								    <a href="https://api.whatsapp.com/send?phone=+919821074100" target="_blank"><i class="fa fa-whatsapp"></i></a></strong>
                        </div>
                    </div>
                    <div class="list-group-item media">
                        <div class="media-left pull-left" style="width: 100px;">
                            <img class="media-object thumbnail" src="<?= base_url();?>assets/web/images/activity/medi2.jpg" alt="1.jpg">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Co-Convenor</h4>
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
                        <p class="project-dp-one">મેડિકલ ક્ષેત્ર દિવસે દિવસે મોંઘુ બનતું જાય છે. બિમારી વખતે હોસ્પિટલ ખર્ચમાં સરકાર તરફથી મળતી સહાય અંગે માર્ગદર્શન, જરૂરિયાતમંદ બિમાર વ્યક્તિઓને સમાજમાંથી મળતી સહાય અંગેની સમજણ અને સાથે રહી સમસ્યાનું નિવારણ કરવું।  જરૂરિયાતમંદોને મેડિકલેમ સહાય આપવી.</p>
                        <p class="project-dp-two">The medical field is becoming more expensive day by day. Guidance on government assistance in hospital expenses at the time of illness, understanding of the assistance received from the community in case of needy sick persons and solving the problem together. Providing medical claims assistance to those in need.<p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>