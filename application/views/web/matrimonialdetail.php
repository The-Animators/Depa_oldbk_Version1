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
                    <h2 class="text-uppercase">Matrimony Details</span></h2>
                </div>
            </div>
        </div>


        <?php //print_r($result['matrimonial_data']); ?>

        <div class="row mt-20">

            <div class="col-md-4">
                <img class="img-responsive img-whp" src="<?= base_url();?>uploads/members/<?= $result['matrimonial_data']->image; ?>" width="100%" alt="<?= $result['matrimonial_data']->fullname; ?>">
            </div>

            <div class="col-md-8">
                <figure class="upcoming-event single">
                    <div class="caption">
                        
                        <!--date ('H:i:s A', strtotime($result['matrimonial_data']->birth_time)); 
                        date_format(strtotime($result['matrimonial_data']->birth_time), 'g:i:s A');
                        -->
                        
                        <div class="event-details">
                            <h3 class="event-title ulockd-mrgn1260"><?= $result['matrimonial_data']->fullname; ?></h3>
                            <div class="event-date"><span class="flaticon-event-date-and-time-symbol text-thm2"></span> DOB: <span class="date"><?= $result['matrimonial_data']->dob; ?></span></div>
                            
                            <div class="row">
                                <p class="text-uppercase col-md-6">Height: <b><?= $result['matrimonial_data']->height; ?></b></p>
                                <p class="text-uppercase col-md-6">Weight: <b><?= $result['matrimonial_data']->weight; ?></b></p>
                                <p class="text-uppercase col-md-6">Age: <b><?= $result['matrimonial_data']->age; ?></b></p>
                                <p class="text-uppercase col-md-6">Mother Name: <b><?= $result['matrimonial_data']->mother_name; ?></b></p>
                                <p class="text-uppercase col-md-6">Birth Time: <b><?php echo date('H:i A', strtotime($result['matrimonial_data']->birth_time)); ?></b></p>
                                <p class="text-uppercase col-md-6">Birth Place: <b><?= $result['matrimonial_data']->place; ?></b></p>

                                <p class="text-uppercase col-md-6">Education: <b><?= $result['matrimonial_data']->education; ?></b></p>
                                <p class="text-uppercase col-md-6">Occupation: <b><?= $result['matrimonial_data']->occupation; ?></b></p>
                                <p class="text-uppercase col-md-6">Nana Nani’s Village: <b><?= $result['matrimonial_data']->material; ?></b></p>
                                

                                <p class="text-uppercase col-md-6">Contact: <u><a href="tel:+91<?= $result['matrimonial_data']->contact; ?>"><?= $result['matrimonial_data']->contact; ?></u></a></p>

                            </div>

                        </div>
                    </div>
                </figure>
                <div align="center" class="mt-10">
                    <a data-toggle="modal" data-target="#rcdModal" id="rcd" href="javascript:;" class="btn btn-warning btn-sm"> <i class="fa fa-user"></i> Request Contact Details</a>
                </div>
            </div>
    </div>
</section>

<div class="modal fade bs-example-modal-md" id="rcdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"><i class="fa fa-user"></i> Enter Your Contact Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="" method="POST" id="login-form" >
                        <div class="col-sm-12 text-center ">
                            <p>(REQUESTING For: <b><?= $result['matrimonial_data']->fullname; ?></b>)</p>
                            <div class="form-group" name="test">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                                <input type="hidden" name="client" value="web">
                                <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                <input type="hidden" name="member_no" value="<?= $result['matrimonial_data']->member_no; ?>">
                            </div>
                            <button type="submit" class="btn btn-default ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default" id="rcdSubmit" data-form="login-form">Request Now <i class="fa fa-save" style="display: none"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- modal footer start here-->
        </div>
    </div>
</div>