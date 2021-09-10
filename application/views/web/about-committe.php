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
<!-- Home Design Inner Pages -->
<?php
        $this->load->view('web/includes/breadcrumb');
    }
?>

<!-- Inner Pages Main Section -->
<section class="ulockd-service-details" <?= $padding ?? '';?>>
    <div class="<?= $container ?? 'container'; ?>">
        <div class="col-md-12">
            <?php if($client == 'web'){ ?>
            <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                        <div class="ulockd-dtitle hvr-float-shadow">
                            <h2 class="text-uppercase">Committee members</span></h2>
                        </div>
                    </div>
                </div>
            <?php }?>
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-project-sm-thumb">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>