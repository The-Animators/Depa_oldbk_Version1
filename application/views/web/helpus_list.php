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
<?php $this->load->view('web/includes/breadcrumb');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">HELP US</span></h2>                
                </div>
            </div>
        </div>

        <?php //print_r($data); ?>

        <div class="row">

            <?php foreach($data as $set){ ?>

            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="panel panel-default" id="birthdaypanel">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $set['title']; ?></h3>
                </div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <div class="ulockd-bp-details" style="padding:0">
                        <div class="ulockd-bp-details" style="padding-top:0">
                            <ul class="">
                                <li><span><b>Contact Person</b>: <?php echo $set['contact_person']; ?></span></li>
                                <li><span><b>Contact Number</b>: <?php echo $set['contact_number']; ?></span></li>
                                <li><span><b>For</b>: <?php echo $set['help_for']; ?></span></li>
                            </ul>
                            <div class="ulockd-bpost">
                                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>helpus_detail/<?php echo $set['id']; ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>