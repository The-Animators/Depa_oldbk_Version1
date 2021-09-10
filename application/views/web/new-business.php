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
<style type="text/css">
    .ulockd-dtitle{margin-bottom:20px!important }
    .size10{font-size: 10px}
</style>
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Business Detail XD</span></h2>
                </div>
            </div>
        </div>

        <div class="row ">
            
            
            <div id="form_loader" class="col-sm-12 col-md-12">
                <form class="donation-form donor-details" id="b2b-form" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required"> Company / Shop Name</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="firm_name" name="firm_name" placeholder="Business Firm Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> Business Category</label><br>
                            <div class="form-group">
                                <?php 
                                    $js = 'id="cat_id" class="form-control ms"';
                                    echo form_dropdown('cat_id', $businesscat, '',$js);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="required"> Product / Service Details</label><br>
                            <div class="form-group">
                                <textarea id="description" name="description" class="form-control" rows="2" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="logo">
                                            <i class="fa fa-file-text-o"></i> Logo
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="logo" name="logo" class="form-control form_control" placeholder="Logo / Visiting Card">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="visitingcard">
                                            <i class="fa fa-file-text-o"></i> Visiting Card
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="visitingcard" name="visitingcard" class="form-control form_control" placeholder="Logo / Visiting Card">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="bimages">
                                            <i class="fa fa-file-text-o"></i> Business Images <small class="size10">(Max 5 Images, Max Total size 10MB)</small>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="bimages" name="bimages[]" class="form-control form_control" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="bvideo">
                                            <i class="fa fa-file-text-o"></i> Video <small><i> Format (mp4) & Max Size (5MB) 30Sec Only</i></small>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="bvideo" name="bvideo" class="form-control form_control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class=""> Brochure</label><br>
                            <div class="form-group">
                                <input type="file" accept="application/pdf" class="form-control" id="pdf" name="pdf" placeholder="Brochure PDF">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class=""> Website</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""> Facebook Link</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""> Instagram Link</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""> Twitter Link</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""> Skype ID</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Skype ID">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""> Whatsapp Nos.</label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="Whatsapp Number">
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
                                <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class=""> Email-id</label><br>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required"> Subcription</label><br>
                            <div class="form-group">
                                <?php 
                                    $js = 'id="subscription" class="form-control ms"';
                                    echo form_dropdown('subscription', $subscription, '',$js);
                                ?>
                                
                            </div>
                        </div>
                    </div>
                            <label class=""> Address</label><br>
                    <div class="form-group">
                        <textarea id="address" name="address" class="form-control" rows="4" placeholder="Address" ></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="client" value="web">
                        <input type="hidden" name="id" value="0">
                        <input type="hidden" name="b2b_cancel_reason" id="b2b_cancel_reason" value="">
                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                        <input type="hidden" name="memberid" value="<?= $this->session->userdata('user_id');?>">
                        <input type="hidden" name="uploaded_by" value="<?= $this->session->userdata('full_name');?>">
                        <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="submitb2b" data-form="b2b-form">Submit business <i class="fa fa-save" style="display: none"></i></button>
                    </div>
                </form>
            </div>
            
            <div class="body" id="loading_loader" align="center" style="display: none;">
                <img src="<?php echo base_url().'assets/admin/images/loader.gif'; ?>" width="50%">
            </div>
            
        </div>
    </div>
</section>