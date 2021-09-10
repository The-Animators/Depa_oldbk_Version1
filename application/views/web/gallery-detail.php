<style>
    .img-whp {
        height: 295px !important;
    }
</style>
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
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb1');?>
<input type="hidden" id="gallerytitle" value="<?= $gallerytitle;?>">
<input type="hidden" id="slug" value="<?= $slug;?>">
<!-- Inner Pages Main Section -->
<section class="ulockd-service-three">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-main-title">
                    <h2 class="text-uppercase"> <span class="text-thm2"><?= str_replace('-',' ',$slug);?></span></h2>
                    <?php
                        $link = $data['gdrive_link'];
                        if (!empty($link)) {
                    ?>
                    <a href="<?= $link; ?>" target="_blank" class="btn btn-success btn-md">View - Google Drive</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?= $html;?>
        </div>
    </div>
</section>