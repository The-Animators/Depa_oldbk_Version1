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
<input type="hidden" id="jobid" value="<?= $jobid;?>">
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase" id="jobTitle">JOB Details</span></h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                </div>
            </div>
        </div>
        <div class="row" id="jobdetail"></div>
    </div>
</section>