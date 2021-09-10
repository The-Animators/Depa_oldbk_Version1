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
<?php
?>
<!-- Home Design Inner Pages -->
<?php $this->load->view('web/includes/breadcrumb');?>
<style type="text/css">
    .ulockd-dtitle{margin-bottom:20px!important }
    .size10{font-size: 10px}
    label{line-height: 45px;height: 45px}
</style>
<!-- Inner Pages Main Section -->
<section class="ulockd-fservice">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase"><?= $title;?>Business Details</span></h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-sm-12 col-md-12">
                <?php //print_r($result);?>
                <form class="donation-form donor-details" id="member-form" method="POST">
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="col-md-6" company_name>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Company Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                             <input type="text" class="form-control" id="company_name" name="company_name" value="<?= $result['company_name'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" designation>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Designation</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                             <input type="text" class="form-control" id="designation" name="designation" value="<?= $result['designation'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" address>
                                <div class="row">
                                    <div class="col-md-4" style="white-space: nowrap;">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="address" name="address" value="<?= $result['address_1'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" m_village>
                                <div class="row">
                                    <div class="col-md-4" style="white-space: nowrap;">
                                        <label>Area</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <?php 
                                                $js = 'id="area" class="form-control ms"';
                                                echo form_dropdown('area', $area, ($result['area_id'] ?? ''), $js);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" pincode>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Pincode</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                             <input type="text" class="form-control" id="pincode" name="pincode" value="<?= $result['pincode'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" website>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Website </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                             <input type="text" class="form-control" id="website" name="website" value="<?= $result['website'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" contact>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Contact</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                             <input type="text" class="form-control" id="contact" name="contact" value="<?= $result['contact'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" email>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Email </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                             <input type="text" class="form-control" id="email" name="email" value="<?= $result['email'] ?? '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group text-center">
                        <input type="hidden" name="client" value="web">
                        <input type="hidden" name="ip" value="<?= $this->input->ip_address();?>">
                        <!-- <input type="hidden" name="photo_file_old" id="photo_file_old" value="<?= $result['image'] ?? '';?>"> -->
                        <input type="hidden" name="member_id" id="member_id" value="<?= $member_id ?? 0 ;?>">
                        <input type="hidden" name="family_id" value="<?= $family_id ?? 0 ;?>">
                        <input type="hidden" name="business_id" value="<?= $business_id ?? 0; ?>">
                        <button type="submit" class="btn btn-md btn-success" id="submitb2b" data-form="member-form">Update Detail <i class="fa fa-save"></i></button>
                        <button type="button" class="btn btn-md btn-danger" id="cancel">Cancel <i class="fa fa-close"></i></button>

                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
