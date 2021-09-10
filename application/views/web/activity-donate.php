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
<section class="ulockd-about">
    <div class="container">
	<?php if($client == 'web'){ ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    <div class="ulockd-dtitle hvr-float-shadow">
                        <h2 class="text-uppercase">DONATE</span></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="booking_form_style1 text-center">
                    <!-- Booking Form Sart-->
                    <form id="donation_form" class="booking_form_area" method="post" novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Form</h3>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="family_id" name="family_id" class="form-control form_control" placeholder="Enter Family no. e.g (DPF0123)" type="text" <?php if($this->session->userdata('family_id') != ''){ echo 'value="'.$this->session->userdata('family_no').'" readonly';} ?>>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="donor_name" name="donor_name" class="form-control form_control" placeholder="Sender / Donor Name" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="email" name="email" class="form-control form_control" placeholder="Email" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="contact_number" name="contact_number" class="form-control form_control noonly" placeholder="Contact Number" minlength="10" maxlength="10" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="address" name="address" class="form-control form_control" placeholder="Enter Address" type="text">
                                </div>
                            </div>

                                <?php 
                                    $catdata = getmaster('donation_category', 'html', 'Donation Category', 'donationcategory');
                                    array_shift($catdata);
                                    foreach($catdata as $row){
                                ?>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?= $row;?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name='general[<?= slugify($row);?>]' class="form-control form_control catamount" type="text">
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="amount" name="amount" class="form-control form_control noonly" placeholder="Total" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12" id="pan_wrapper" style="display: none">
                                <div class="form-group">
                                    <input type="text" id="pan_no" name="pan_no" class="form-control form_control" placeholder="PAN Number" minlength="10" maxlength="10" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="reason" name="reason" class="form-control form_control" placeholder="Reason" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="rnumber" name="rnumber" class="form-control form_control" placeholder="Refrence Number of Payment" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="client" id="client" value="web">
                                <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" id="donate" data-form='donation_form' >Donate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <p><h3 ><center>Kindly Scan the Qr Code</center></h3></p>
               <center> <img src="<?= base_url();?>assets/img/qrcode.jpg" class="img-responsive"></center>
                
                <h3 > <center>Or</center></h3>
                 
                <h4 > <center>UPI ID:- bharatpe.0104762017@indus</center></h4>
                
                <h3 > <center>Or</center></h3>
                <p><h4><center>
RTGS DETAILS <br>
Bank Name : COSMOS BANK (Dadar West)<br>
Account Name : SHREE DEPA JAIN MAHAJAN TRUST<br>
Account Nos : 01205010160704<br>
IFSC Code : COSB0000012<br>
</center></h4></p>
            </div>
        </div>
    </div>
</section>