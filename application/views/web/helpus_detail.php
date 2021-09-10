<script src="<?= base_url();?>assets/web/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web/css/jssor.css">
     <style>
        th{
            border-left: 1px solid #cecece;
            border-right: 1px solid #cecece;
        }
        video {
          width: 100%;
          height: auto;
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
<input type="hidden" id="id" value="<?= $id;?>">

<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title bold" id="firmname"><?php echo $data['help_data'][0]['title']; ?></h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">

                            <?php //echo print_r($data); ?>

                        	<div class="table-responsive">
                              	<table class="table table-bordered table-striped">
	                                <tr>
	                                   <th>Contact Person</th>
	                                   <td><?php echo $data['help_data'][0]['contact_person']; ?></td>
	                                   <th>Contact Number</th>
	                                   <td><?php echo $data['help_data'][0]['contact_number']; ?></td>
	                                </tr>
	                                <tr>
	                                   <th>Help For</th>
	                                   <td colspan="6"><?php echo $data['help_data'][0]['help_for']; ?></td>
	                                </tr>
	                                <tr>
	                                   <th>Details</th>
	                                   <td colspan="6"><?php echo $data['help_data'][0]['details']; ?></td>
	                                </tr>
                           		</table>
                          	</div>

                        </div>
                    </div>

                    <!-- Slider -->
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="ism-slider" id="my-slider">
							  <ol>

                                <?php foreach($data['help_image'] as $value){ ?>

							    <li>
							      <img src="<?= base_url(); ?>uploads/helpus/<?php echo $value['image']; ?>">
							    </li>

                                <?php } ?>

							  </ol>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
