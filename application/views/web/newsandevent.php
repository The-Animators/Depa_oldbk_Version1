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
	<?php if($client == 'web'){ ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    <div class="ulockd-dtitle hvr-float-shadow">
                        <h2 class="text-uppercase">Latest : News, Events & Updates</span></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
        <ul class="nav nav-tabs tabs_subheader">
            <li class="active">
                <a data-toggle="tab" href="#Upcoming">Upcoming</a>
            </li>
            <li>
                <a data-toggle="tab" href="#Past">Past</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="Upcoming" class="tab-pane fade active in"></div>
            <div id="Past" class="tab-pane fade"></div>
        </div>       
    </div>
</section>