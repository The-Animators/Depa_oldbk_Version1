<style type="text/css">
    .ui-datepicker-month,.ui-datepicker-year{color: #555;font-weight: normal;border: none}
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
<?php $this->load->view('web/includes/breadcrumb');?>

<!-- Inner Pages Main Section -->
<section class="ulockd-ip-latest-news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 ulockd-ext-spc">
                <div class="ulockd-bp-thumb">
                    <img class="img-responsive img-whp" src="<?= base_url();?>assets/web/images/blog/jobs.png" alt="5.jpg">
                </div>
            </div>
             <div class="col-sm-12 col-md-12">
                <form class="donation-form donor-details" id="b2b-form" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required"> Business Name</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firm_name" name="firm_name" placeholder="Business Firm Name">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="required"> Designation</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> Contact Person</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> Contact Number</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control noonly" id="contact_number" name="contact_number" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> Email-Id</label><br>
                            <div class="form-group">
                                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Contact Email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="required"> Start Date</label><br>
                            <div class="form-group">
                                <input type="date" class="form-control" id="start_date_old" name="start_date" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> End Date</label><br>
                            <div class="form-group">
                                <input type="date" class="form-control" id="end_date_old" name="end_date" placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> No Of Vaccancy</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control noonly" id="openings" name="openings" placeholder="No Of Vaccancy">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> Location</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""> Experience</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="experience" name="experience" placeholder="Experience">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> CTC Range From</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="salary_range_start" name="salary_range_start" placeholder="CTC Range From">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> CTC Range To</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="salary_range_end" name="salary_range_end" placeholder="CTC Range To">
                                <input type="hidden" name="client" value="web">
                                <input type="hidden" name="id" value="0">
                                <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                                <input type="hidden" name="memberid" value="<?= $this->session->userdata('user_id');?>">
                                <input type="hidden" name="uploaded_by" value="<?= $this->session->userdata('full_name');?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="required"> Job Description</label><br>
                            <div class="form-group">
                                <textarea class="form-control" id="description" name="description" placeholder="Job Description"></textarea>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default" id="submitb2b" data-form="b2b-form">Submit Job <i class="fa fa-save" style="display: none"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>